<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;
use App\OrderItem;
use App\OrderDeposit;
use App\OrderPromo;
use App\OrderLog;
use App\PromoCode;
use App\Transaction;
use App\User;

use Log;
use DB;
use Validator;
use Auth;
use URL;
use Mail;

class AdminOrderController extends Controller
{
    //
    public function orderDeposit($id) {

		$order = Order::find($id);
		$user = User::find($order->user_id);
		return view('admin.orders.deposit', [
			'user'=>$user,
			'order'=>$order,
		]);

	}
    public function orderAction($id,$action)
	{

		$order =  Order::find($id);
		$shipping = PromoCode::find($order->shipping_id);
		$user = User::find($order->user_id);

		switch($action)
		{
			case 'approve':
				$order->status = 'processing';
				$order->payment_status = 'paid';
				
				$orderLog = OrderLog::create([
					'order_id'=>$id,
					'title'=>'APPROVED',
					'content'=>'APPROVED payment',
				]);

				$orderItem = OrderItem::where('order_id','=',$id)->get();
				foreach ($orderItem as $x) {

					$t = Transaction::where('type','=','res')
					->where('product_id','=',$x->product_id)
					// ->where('variation_id','=',$x->variation_id)
					->where('user_id','=',$order->user_id)
					->where('qty','=',$x->qty)
					->delete();

					$transaction = Transaction::create([
						'product_id'=>$x->product_id,
						// 'variation_id'=>$x->variation_id,
						'qty'=>$x->qty,
						'user_id'=>$order->user_id,
						'type'=>'so',
					]);

					
					
				}
				
				$url = URL::to('/');
				
				if($order->shipping_type=='courier')
				{
					$data = array(
						'order_id'=>$order->order_id,
						'id'=>$order->id,
						'email'=>$user->email,
						'user_id'=>$user->id,
						'url'=>$url,
						'grab_info'=>$order->shipping->info,
					); 

					// Mail::send(['html'=>'approve_grab'], $data, function($message) use ($data) {
					// 	$message->to($data['email'], $data['email'])->subject('Payment Approved');
					// 	$message->from('order@retandro.com','RET & RO SHOPPING');
					// });

				}
				else
				{
					$data = array(
					'order_id'=>$order->order_id,
					'id'=>$order->id,
					'email'=>$user->email,
					'user_id'=>$user->id,
					'url'=>$url
				); 

					// Mail::send(['html'=>'approve'], $data, function($message) use ($data) {
					// 	$message->to($data['email'], $data['email'])->subject('Payment Approved');
					// 	$message->from('order@retandro.com','RET & RO SHOPPING');
					// });

				}



			break;
			case 'ship':
				$order->status = 'ship';
				$orderLog = OrderLog::create([
					'order_id'=>$id,
					'title'=>'SHIPPED',
					'content'=>'Shipped thru '.$shipping->description,
				]);
				$orderItem = OrderItem::where('order_id','=',$id)->get();
				$user = User::find($order->user_id);
				$url = URL::to('/');
			
				$data = array(
						'email'=>$user->email,
						'url'=>$url,
						'order_id'=>$order->order_id,
					); 
				
				// Mail::send(['html'=>'order_shipped'], $data, function($message) use ($data) {
				// 	$message->to($data['email'], $data['email'])->subject('Ret & Ro Order Shipped');
				// 	$message->from('order@retandro.com','Ret & Ro Order Shipped');
				// });


	
				


			break;
			case 'pickup':
				$order->status = 'pick-up';
				$orderLog = OrderLog::create([
					'order_id'=>$id,
					'title'=>'PICKUP',
					'content'=>'Your Item is Ready for Pickup',
				]);
				$orderItem = OrderItem::where('order_id','=',$id)->get();
				$user = User::find($order->user_id);
				$url = URL::to('/');

				$data = array(
						'email'=>$user->email,
						'url'=>$url,
						'id'=>$order->id,
						'user_id'=>$order->user_id,
					); 
				
				// Mail::send(['html'=>'order_pickup'], $data, function($message) use ($data) {
				// 	$message->to($data['email'], $data['email'])->subject('Ret & Ro Order Pickup');
				// 	$message->from('order@retandro.com','Ret & Ro Order Pickup');
				// });



			break;

			case 'delivered':
				$order->status = 'delivered';
				if($order->payment_method=='cod')
				{
					$order->payment_status = 'paid';
				}
				$orderLog = OrderLog::create([
					'order_id'=>$id,
					'title'=>'DELIVERED',
					'content'=>'Delivered Successfully',
				]);

				$url = URL::to('/');
				$data = array(
					'order_id'=>$order->order_id,
					'id'=>$order->id,
					'email'=>$user->email,
					'user_id'=>$user->id,
					'url'=>$url
				); 

				// Mail::send(['html'=>'delivered'], $data, function($message) use ($data) {
				// 	$message->to($data['email'], $data['email'])->subject('Item/s Delivered');
				// 	$message->from('order@retandro.com','RET & RO SHOPPING');
				// });



			break;
			case 'cancelled':
				$order->status = 'cancelled';
				$orderLog = OrderLog::create([
					'order_id'=>$id,
					'title'=>'CANCELLED',
					'content'=>'Order cancelled',
				]);

				 $oi = OrderItem::where('order_id','=',$order->id)->get();
					foreach($oi as $o)
					{

						$t = Transaction::where('type','=','res')
						->where('product_id','=',$o->product_id)
						->where('user_id','=',$order->user_id)
						->where('qty','=',$o->qty)
						->delete();
					}

					$orderLog = OrderLog::create([
							'order_id'=>$order->id,
							'title'=>'ORDER CANCELLED',
							'content'=>'ORDER CANCELLED',
						]);

			
			break;
			case 'retake':
				$order->status = 'waiting';
				$orderLog = OrderLog::create([
					'order_id'=>$id,
					'title'=>'RETAKE',
					'content'=>'Please Re-Upload the copy of your Deposit Slip',
				]);

				$user = User::find(Auth::user()->id);
				$url = URL::to('/');


				$user = User::find($order->user_id);
				$url = URL::to('/');
				$data = array(
					'order_id'=>$order->order_id,
					'id'=>$order->id,
					'email'=>$user->email,
					'user_id'=>$user->id,
					'url'=>$url
				); 


				// Mail::send(['html'=>'retake'], $data, function($message) use ($data) {
				// 	$message->to($data['email'], $data['email'])->subject('Retake payment photo');
				// 	$message->from('order@retandro.com','RET & RO SHOPPING');
				// });



			break;
			case 'reship':

	
			break;

			case 'done':

			$order->status = 'delivered';
			$order->payment_status = 'paid';
	
				$orderLog = OrderLog::create([
					'order_id'=>$id,
					'title'=>'DELIVERED',
					'content'=>'Delivered/PICKED UP Successfully',
				]);

				$url = URL::to('/');
				$data = array(
					'order_id'=>$order->order_id,
					'id'=>$order->id,
					'email'=>$user->email,
					'user_id'=>$user->id,
					'url'=>$url
				); 


			break;
		}
		$order->save();

		return redirect()->back()->with('flash_message', 'Updated order!!');
	}

    public function index(Request $request)
	{
		//
		//Log::info($request);
		

		$type = $request->type;
		if($request->type=='paid' or $request->type=='unpaid')
		{
	
			$stat =  '0';
			$payment = ($request->input('type') == null ? '0' : $request->input('type'));
		}
		else
		{
			$stat = (($request->input('type') == null || $request->input('type')=='all')? '0' : $request->input('type'));
			$payment ='0';

		}

		if($request->search=='')
		{
		
			$orders = Order::with('orderPromo')
			->whereRaw("(('".$stat."'='0') OR (orders.status='".$stat."'))")
			->whereRaw("(('".$payment."'='0') OR (orders.payment_status='".$payment."'))")
			->orderBy('id','desc')
			->paginate(10);
		}
		else
		{
			
			$orders = Order::with('orderPromo')
			->select([
				'orders.*'
			])
			->join('promo_codes','promo_codes.id','=','orders.shipping_id')
			->join('users','users.id','=','orders.user_id')
			->Where(function ($query) use ($request) {
				$query->where('orders.order_id','like', '%'.$request->search.'%')
				->orWhere('users.last_name','like', '%'.$request->search.'%')
				->orWhere('orders.payment_method','like', '%'.$request->search.'%')
				->orWhere('promo_codes.description','like', '%'.$request->search.'%')
				->orWhere(DB::raw('concat(users.first_name," ",users.last_name)') , 'LIKE' , '%'.$request->search.'%')
				->orWhere('users.first_name','like', '%'.$request->search.'%');
			})
			->whereRaw("(('".$stat."'='0') OR (orders.status='".$stat."'))")
			->whereRaw("(('".$payment."'='0') OR (orders.payment_status='".$payment."'))")
			->orderBy('orders.id','desc')
			->paginate(10);

			
		}


		

	  
		return view('admin.orders.index', [
			'orders'=>$orders,
			'type'=>$type,
		]);
	}

	public function show($id)
	{

		$order = Order::find($id);
		$orderPromo = Order::find($id);
		$orderItems = OrderItem::where('order_id','=',$id)->get();
		$orderPromo = OrderPromo::where('order_id','=',$id)->get();
		$orderLogs = OrderLog::where('order_id','=',$id)->orderBy('id','desc')->get();
		$customer = User::where('id','=',$order->user_id)->first();
		Log::info($orderItems);
		return view('admin.orders.show', [
			'order'=>$order,
			'orderItems'=>$orderItems,
			'orderPromo'=>$orderPromo,
			'orderLogs'=>$orderLogs,
			'customer'=>$customer,
		]);
	}
}
