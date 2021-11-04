<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Log;
use DB;
use Carbon\Carbon;
use App\Product;
use App\Transaction;
use App\Order;
use App\OrderItem;
use App\OrderLog;
use App\BillingAddress;
use App\PromoCode;
use App\OrderPromo;
use App\User;
use Darryldecode\Cart\Cart;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Support\Facades\Input;

use PayPal;
use Auth;
use URL;
use Mail;
use Session;
use Validator;
use Darryldecode\Cart\Helpers\Helpers;

class CartController extends Controller
{
    //
    public function removeItem($id)
	{
		\Cart::session(Auth::user()->id)->remove($id); 
		// \Cart::clear();

		return redirect()->back()->with('flash_message', 'Item Removed');

	}
	
    public function addQty($id)
	{


		$ct = \Cart::session(Auth::user()->id)->get($id);
		Log::info($ct);
		$item_qty = $ct->quantity;
		$p = Product::find($ct->id);

		$po = Transaction::where('product_id','=',$p->id)->where('type','=','po')->sum('qty');
		$so = Transaction::where('product_id','=',$p->id)->where('type','=','so')->sum('qty');
		$res = Transaction::where('product_id','=',$p->id)->where('type','=','res')->sum('qty');
		$tot = $po-$so-$res;
		// Log::info('$tot>0');
		// Log::info($tot>$item_qty);
		if($tot>$item_qty)
		{
	


			\Cart::update($id, array(
			 'quantity' => 1
			));

			return redirect()->back()->with('flash_message', 'Added Qty');
		}
		else
		{

			return redirect()->back()->with('error_message', 'Out of Stock');
		}


		

	}
	public function subQty($id)
	{

		if(\Cart::session(Auth::user()->id)->get($id)->quantity > 1)
		{
			\Cart::session(Auth::user()->id)->update($id, array(
				'quantity' => -1
			));
			return redirect()->back()->with('flash_message', 'Subtracted Qty');
		}
		else
		{
				\Cart::remove($id);
				return redirect()->back()->with('flash_message', 'Item Removed');
		}
		

		// 

	}

    public function applyPromo(Request $request)
	{
		
		$promo = PromoCode::where('code','=',$request->code)
		->where('active','=',1)
		->where(function($query) {
			$query->where(function($q1){
				$q1->whereDate('date_from','<=',Carbon::now()->toDateString())
			->whereNull('date_to');
			})
			->orWhere(function($q2){
				$q2->whereDate('date_from','<=',Carbon::now()->toDateString())
				->whereDate('date_to','>=',Carbon::now()->toDateString())
				->whereNotNull('date_to');
			});

		})

		->first();

		// Log::info($promo);
		if(!$promo){
			Log::info('1');
			return redirect()->back()->with('error_message', 'Promo Not Applicable!');
		}


		if($promo->type=='firstorder')
		{
			Log::info('2');
			$o = Order::where('user_id','=',Auth::user()->id)->count();
			if($o>=1)
			{
				return redirect()->back()->with('error_message', 'Promo Not Applicable!');
			}
			
		}

		// //***************************

		$cartConditionCount  = 0;
		$shipping_value = 0;
		$one_promo_code = 3;
		foreach(\Cart::session(Auth::user()->id)->getConditions() as $x)
		{
			// Log::info($x->getName());
			// Log::info($x->getType());
			if($x->getType()<>'shipping_type')
			{
				$cartConditionCount = $cartConditionCount+1;
			}
			else
			{
				$shipping_value = $x->getValue();				
			}
		}
		foreach(\Cart::session(Auth::user()->id)->getContent() as $f)
		{
			$cartConditionCount = $cartConditionCount + count($f->conditions);
			
		}
		// Log::info($cartConditionCount);
		if($promo)
		{
			
			if($promo->discount_type=='product')
			{
				$sp = PromoCodeSpecific::where('promo_code_id','=',$promo->id)->first();
				if(\Cart::session(Auth::user()->id)->getContent()->where('attributes.product_id',$sp->product_id)->count()>0)
				{
					
					// $one_promo_code =  DB::table('var')
					// 	->where('name','=','one_promo_code')
					// 	->first();
							
					
					


					if($one_promo_code>0 && $cartConditionCount>0)
					{
				
						return redirect()->back()->with('error_message', 'PROMO Already appplied');
					}
					else
					{

						foreach(\Cart::session(Auth::user()->id)->getContent()->where('attributes.product_id',$sp->product_id) as $x)
						{
							if($promo->type=='freeshipping')
							{
								$condition = new \Darryldecode\Cart\CartCondition(array(
								'name' => "FREESHIPPING",
								'type' => $promo->type,
								'target' => $promo->target,
								'value' => $shipping_value*-1,
								'order' => $promo->order,
								'attributes' => array( 
									'description' => $promo->description,
									'promo_id' => $promo->id,
								)
								));

							}
							else
							{
								$condition = new \Darryldecode\Cart\CartCondition(array(
								'name' => $promo->code,
								'type' => $promo->type,
								'target' => $promo->target,
								'value' => $promo->value,
								'order' => $promo->order,
								'attributes' => array( 
									'description' => $promo->description,
									'promo_id' => $promo->id,
								)
								));
							}
							
							\Cart::session(Auth::user()->id)->addItemCondition($sp->product_id, $condition);
						}
				

						$sub = \Cart::session(Auth::user()->id)->getSubtotal(); 
						$tot = \Cart::session(Auth::user()->id)->getTotal(); 
						\Cart::session(Auth::user()->id)->condition($condition); 

						
						return redirect()->back()->with('promo_applied', 'PROMO Applied!!');
					}



				}
				else
				{
	
					return redirect()->back()->with('error_message', 'PROMO Not Applicable to Current Cart');
				}
			
				// $promo_code_specific = PromoCodeSpecific::where('promo_code_id','=',$promo->id);
				// Log::info($promo_code_specific);
				
			}
			elseif($promo->discount_type=='category')
			{
				
				$sp = PromoCodeSpecific::where('promo_code_id','=',$promo->id)->first();

				if(\Cart::session(Auth::user()->id)->getContent()->where('attributes.category_id',$sp->category_id)->count()>0)
				{
					
					
					if($one_promo_code>0 && $cartConditionCount>0)
					{
				
						return redirect()->back()->with('error_message', 'PROMO Already appplied');
					}
					else
					{
						foreach(\Cart::session(Auth::user()->id)->getContent()->where('attributes.category_id',$sp->category_id) as $x)
						{
							if($promo->type=='freeshipping')
							{
								$condition = new \Darryldecode\Cart\CartCondition(array(
								'name' => "FREESHIPPING",
								'type' => $promo->type,
								'target' => $promo->target,
								'value' => $shipping_value*-1,
								'order' => $promo->order,
								'attributes' => array( 
									'description' => $promo->description,
									'promo_id' => $promo->id,
								)
								));

							}
							else
							{
								$condition = new \Darryldecode\Cart\CartCondition(array(
								'name' => $promo->code,
								'type' => $promo->type,
								'target' => $promo->target,
								'value' => $promo->value,
								'order' => $promo->order,
								'attributes' => array( 
									'description' => $promo->description,
									'promo_id' => $promo->id,
								)
								));
							}
							
							\Cart::session(Auth::user()->id)->addItemCondition($x->id, $condition);
						}
				

						$sub = \Cart::session(Auth::user()->id)->getSubtotal(); 
						$tot = \Cart::session(Auth::user()->id)->getTotal(); 
						\Cart::session(Auth::user()->id)->condition($condition); 

						
						return redirect()->back()->with('promo_applied', 'PROMO Applied!!');
					}



				}
				else
				{
	
					return redirect()->back()->with('error_message', 'PROMO Not Applicable to Current Cart');
				}

			}
			elseif($promo->discount_type=='over_amount')
			{
				Log::info('over_amount');
				if($promo->over>\Cart::session(Auth::user()->id)->getSubTotal())
				{
					return redirect()->back()->with('error_message', 'PROMO Not Applicable to Current Cart');
				}
				else
				{

				
					if($promo->type=='freeshipping')
					{
						$condition = new \Darryldecode\Cart\CartCondition(array(
						'name' => "FREESHIPPING",
						'type' => $promo->type,
						'target' => $promo->target,
						'value' => $shipping_value*-1,
						'order' => $promo->order,
						'attributes' => array( 
							'description' => $promo->description,
							'promo_id' => $promo->id,
						)
						));

					}
					else
					{
						$condition = new \Darryldecode\Cart\CartCondition(array(
						'name' => $promo->code,
						'type' => $promo->type,
						'target' => $promo->target,
						'value' => $promo->value,
						'order' => $promo->order,
						'attributes' => array( 
							'description' => $promo->description,
							'promo_id' => $promo->id,
						)
						));

					}
					
				

			


						if($one_promo_code>0 && $cartConditionCount>0)
						{
					
							return redirect()->back()->with('error_message', 'PROMO Already appplied');
						}
						else
						{
					
							\Cart::session(Auth::user()->id)->condition($condition);

							$sub = \Cart::session(Auth::user()->id)->getSubtotal(); 
							$tot = \Cart::session(Auth::user()->id)->getTotal(); 
							\Cart::session(Auth::user()->id)->condition($condition); 

							
							return redirect()->back()->with('promo_applied', 'PROMO Applied!!');
						}

				}
			}
			elseif($promo->discount_type=='all')
			{
				Log::info('all');

				// $one_promo_code =  DB::table('var')
				// 				->where('name','=','one_promo_code')
				// 				->first();

				if($one_promo_code>0 && $cartConditionCount>0)
				{
			
					return redirect()->back()->with('error_message', 'PROMO Already appplied');
				}
				else
				{

					if($promo->type=='freeshipping')
					{
						// Log::info('freeshipping');
						$condition = new \Darryldecode\Cart\CartCondition(array(
						'name' => "FREESHIPPING",
						'type' => $promo->type,
						'target' => $promo->target,
						'value' => $shipping_value*-1,
						'order' => $promo->order,
						'attributes' => array( 
							'description' => $promo->description,
							'promo_id' => $promo->id,
						)
						));
						\Cart::session(Auth::user()->id)->condition($condition);

					}
					else
					{
						// Log::info('dito');
						$condition = new \Darryldecode\Cart\CartCondition(array(
						'name' => $promo->code,
						'type' => $promo->type,
						'target' => $promo->target,
						'value' => $promo->value,
						'order' => $promo->order,
						'attributes' => array( 
							'description' => $promo->description,
							'promo_id' => $promo->id,
						)
						));

						\Cart::session(Auth::user()->id)->condition($condition);
				}

			

						// Log::info(\Cart::getContent());
						$sub = \Cart::session(Auth::user()->id)->getSubtotal(); 
						$tot = \Cart::session(Auth::user()->id)->getTotal(); 
						\Cart::session(Auth::user()->id)->condition($condition); 

						 return redirect()->back()->with('promo_applied', 'PROMO Applied!!');
				}



				
			}



		}
		else
		{
			Log::info('error');
			return redirect()->back()->with('error_message', 'PROMO Invalid');
		}

	
		
	}

    public function cartData($invoice_id)
	{

		$data = [];
		$data['items'] = [];
		$tot_price = 0;

		foreach(\Cart::session(Auth::user()->id)->getContent() as $x)
		{
			$itemDetails = [
				'name' => $x->name,
				'price' => $x->price,
				'qty' => $x->quantity,
				'product_id' => $x->id,
			];
			$data['items'][]=$itemDetails;
			$tot_price = $tot_price + ($x->price*$x->quantity);
			// Log::info($x->getPriceWithConditions());
			
			foreach($x->conditions as $c)
			{

				$itemDetails = [
					'name' => $c->getAttributes()['description'],
					'price' => $c->getValue(),
					'qty' => 1,
				];
				$data['items'][]=$itemDetails;
				$tot_price = $tot_price + $c->getValue();
				
			}
					

			
		}

		foreach(\Cart::session(Auth::user()->id)->getConditions() as $x)
		{


			$condition = \Cart::session(Auth::user()->id)->getCondition($x->getName());
			$conditionCalculatedValue = $condition->getCalculatedValue(\Cart::getSubTotal());
	
			if( $this->valueIsToBeSubtracted($x->getValue()) )
			{
				$itemDetails = [
					'name' => $x->getName(),
					'price' => number_format((-1 * abs($conditionCalculatedValue)),2),
					'qty' => 1,
				];
				$data['items'][]=$itemDetails;

				$tot_price = $tot_price + (-1 * abs($conditionCalculatedValue));
			}
			else if ( $this->valueIsToBeAdded($x->getValue()) )
			{
				$itemDetails = [
					'name' => $x->getName(),
					'price' => number_format(($conditionCalculatedValue),2),
					'qty' => 1,
				];
				$data['items'][]=$itemDetails;
				$tot_price = $tot_price + $conditionCalculatedValue;
			}
			else
			{
				$itemDetails = [
					'name' => $x->getName(),
					'price' => number_format(($conditionCalculatedValue),2),
					'qty' => 1,
				];
				$data['items'][]=$itemDetails;
				$tot_price = $tot_price + $conditionCalculatedValue;
			}

		}


			// $itemDetails = [
			// 	'name' => 'discount',
			// 	'price' => number_format(-1 * abs($tot_price-\Cart::getTotal()) ,2),
			// 	'qty' => 1,
			// ];
			// $data['items'][]=$itemDetails;

	
		$data['invoice_id'] = $invoice_id;
		$data['invoice_description'] = "Order ID:{$data['invoice_id']}";
		$data['return_url'] = url('/paypal/success');
		$data['cancel_url'] = url('/cart');

		



		// $data['discount'] = number_format($tot_price-\Cart::getTotal(),2);
		$data['total'] = number_format($tot_price,2);
		// Log::info('cartData');

		return $data;
	}
    public function submit(Request $request)
	{
	

		$invoice_id = abs(crc32(uniqid()));
		$data = $this->cartData($invoice_id);

		$note = (Session::get('note')==null) ? '' : Session::get('note');


		DB::beginTransaction();
		try {

			$order = Order::create([
				'order_id'=>$data['invoice_id'],
				'user_id'=>Auth::user()->id,
				'billing_address_id'=>$request->billing_id,
				'shipping_type'=>$request->shipping,
				'status'=>'waiting',
				'payment_method'=>'bank-transfer',
				'total'=>str_replace(",", "", $data['total']),
				'notes'=>$note,
			]);
			Session::set('note','');
			$orderLog = OrderLog::create([
				'order_id'=>$order->id,
				'title'=>'ORDER PLACED',
				'content'=>'Order Placed via bank-transfer',
			]);

			foreach(\Cart::session(Auth::user()->id)->getContent() as $x)
			{
				$price = 0;
				
				$order_item = OrderItem::create([
					'order_id'=>$order->id,
					'product_id'=>$x->id,
				
					'status'=>'okay',
					'qty'=>$x->quantity,
					'price'=>$x->price,
				]);

				$transaction = Transaction::create([
						'product_id'=>$x->id,
						'order_id'=>$order->id,
						'qty'=>$x->quantity,
						'user_id'=>Auth::user()->id,
						'type'=>'res',
					]);


				foreach($x->conditions as $c)
				{
				
					$discount = OrderItemDiscount::create([
						'description'=>$c->getAttributes()['description'],
						'order_item_id'=>$order_item->id,
						'promo_code_id'=>$c->getAttributes()['promo_id'],
					]);
					
				}

				

			}
			foreach(\Cart::getConditions() as $x)
			{
				$order_promo = OrderPromo::create([
					'order_id'=>$order->id,	
					'promo_code_id'=>$x->getAttributes()['promo_id'],	
					'calculated_value'=>$x->getCalculatedValue(\Cart::getSubTotal()),	
				]);
			}

			$user = User::find(Auth::user()->id);
			$billing_address = BillingAddress::find($request->billing_id);			
			$url = URL::to('/');


			$info = array(
				'content'=>\Cart::session(Auth::user()->id)->getContent(),
				'info'=>$data,
				'user'=>$user,
				// 'user_id'=>$user,
				'order_id'=>$order->order_id,
				'user_id'=>$order->user_id,
				'id'=>$order->id,
				'url'=>$url,
				'email'=>$user->email,
				'billing_address'=>$billing_address,
				

			); 

			// Mail::send(['html'=>'order_done'], $info, function($message) use ($info) {
			// 	$message->to($info['email'], $info['email'])->subject('Order Confirmation');
			// 	$message->from('order@retandro.com','RET & RO Shopping');
			// });

			// Mail::send(['html'=>'reminder'], $info, function($message) use ($info) {
			// 		$message->to($info['email'], $info['email'])->subject('Pending Order Received');
			// 		$message->from('order@retandro.com','RET & RO Shopping');
			// 	});

		

			\Cart::session(Auth::user()->id)->clearCartConditions();
			\Cart::session(Auth::user()->id)->clear();
			$email = Auth::user()->email;


			 DB::commit();
			return redirect()->route('marketplace')
			->with('order_placed', 'Success!')
			->with('email',$email)
			->with('order_id',$order->order_id);
	

		  
		} catch (\Exception $e) {
			Log::info($e);
			  DB::rollback();
		   return redirect()->route('marketplace')->with('error_message', 'An Error has Occurred');
		}

	

	}
    public function payment(Request $request)
	{
		// foreach(\Cart::session(Auth::user()->id)->getContent() as $x)
		// {
		// 	log::info($x);
		// }
		$fee = 0;
		if($request->shipping=='provincial')
		{
			$fee = 250;
		}
		elseif($request->shipping=='gma')
		{
			$fee= 150;
		}



		$condition = new \Darryldecode\Cart\CartCondition(array(
			    'name' => $request->shipping,
			    'type' => 'shipping_type',
			    'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
			    'value' => $fee,
			    'attributes' => array( // attributes field is optional
			    	'description' => 'Shipping Type',
			    	'promo_id' => null,

			    )
			));

		\Cart::session(Auth::user()->id)->condition($condition);

		
		// $total = \Cart::getSubTotal() +$fee;


		return view('checkout.payment',[
			// 'user'=>$user,
			// 'billingAddress'=>$user->billingAddress,
			'billing_id'=>$request->billing_id,
			'shipping'=>$request->shipping,
			// 'val'=>$val,
			// 'total'=>$total,
			'contact_number'=>$request->contact_number,
		]);
		

	}


    public function shipping(Request $request)
	{

		if($request->billing_id=='')
		{
			 return redirect()
		    	->back()
		        ->with('shipping_error' , 'Please select a shipping address');
		}
		\Cart::session(Auth::user()->id)->clearCartConditions();

		$user = User::find(Auth::user()->id);

		Session(['note' =>  $request->note]); 
		// $shipping = PromoCode::where('type','=','shipping')->where('active',1)->get();

		// $condition = \Cart::getCondition('FREESHIPPING');
	
		return view('checkout.shipping',[
				'user'=>$user,
				'billingAddress'=>$user->billingAddress,
				'billing_id'=>$request->billing_id,
				// 'shipping'=>$shipping,
				'contact_number'=>$request->contact_number,
			]);
		
		

	}

    public function information()
	{
	
		\Cart::session(Auth::user()->id)->clearCartConditions();
		$user = User::find(Auth::user()->id);
		return view('checkout.information',[
			'user'=>$user,
			'billingAddress'=>$user->billingAddress,
		]);
	}

    public function addToCart(Request $request)
	{
	
		$ct = \Cart::session(Auth::user()->id)->get($request->variation_id);
		$item_qty = ($ct) ? $ct->quantity: 0;

		$po = Transaction::where('product_id','=',$request->product_id)->where('type','=','po')->sum('qty');
		$so = Transaction::where('product_id','=',$request->product_id)->where('type','=','so')->sum('qty');
		$res = Transaction::where('product_id','=',$request->product_id)->where('type','=','res')->sum('qty');
		$tot = $po-$so+$res;
		if($tot>$item_qty)
		{

			
		$qty = ($request->qty) ? $request->qty : 1;
	
		$p = Product::find($request->input('product_id'));
		//Log::info($p->product_code);
		// Log::info($v);

	
		\Cart::session(Auth::user()->id)->add(array(
			'id' => $p->id,
			'name' => $p->product_name,
			'price' => $p->price,
			'quantity' => $qty,
			'attributes' => array('product_id'=>$p->id,'category_id'=>$p->category_id,'product_code' => $p->product_code),
			'associatedModel' => 'App\Product'
		));
	
		

		// Log::info(\Cart::getContent());


		// Log::info('pasokgi');
		
		// return redirect()->route('client-view-cart');
			return redirect()->back()->with('add_to_cart', route('client-view-cart'));
		}
		else
		{
			return redirect()->back()->with('error_message', 'This item is Out of Stock');
		}
		
	
	}

	public function viewCart()
	{
		
		\Cart::session(Auth::user()->id)->clearCartConditions();
		foreach(\Cart::session(Auth::user()->id)->getContent() as $x)
		{
			\Cart::session(Auth::user()->id)->clearItemConditions($x->id);
		}

	
		return view('checkout.cart',[]);
	}


	protected function valueIsPercentage($value)
	{
		return (preg_match('/%/', $value) == 1);
	}

	/**
	 * check if value is a subtract
	 *
	 * @param $value
	 * @return bool
	 */
	protected function valueIsToBeSubtracted($value)
	{
		return (preg_match('/\-/', $value) == 1);
	}

	/**
	 * check if value is to be added
	 *
	 * @param $value
	 * @return bool
	 */
	protected function valueIsToBeAdded($value)
	{
		return (preg_match('/\+/', $value) == 1);
	}

	/**
	 * removes some arithmetic signs (%,+,-) only
	 *
	 * @param $value
	 * @return mixed
	 */
	protected function cleanValue($value)
	{
		return str_replace(array('%','-','+'),'',$value);
	}


}
