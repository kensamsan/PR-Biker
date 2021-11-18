<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;
use App\OrderItem;
use App\OrderPromo;
use App\OrderDeposit;
use App\BillingAddress;
use App\OrderLog;
use App\User;
use Log;
use URL;
use Mail;
use Auth;
use Validator;

class OrderController extends Controller
{
    //
    public function orderDepositSubmit(Request $request)
	{
		// Log::info($request);

		$validator = Validator::make($request->all(), [
			'deposit_photo' => 'required',    
			
		]);

		if ($validator->fails()) {
		    return redirect()
		    	->route('order-deposit',$request->order_id)
		                ->withErrors($validator)
		                ->withInput();
		}
		
		if($request->file('deposit_photo')==null || $request->file('deposit_photo')=='')
		{
		 $deposit_photo='';
		}
		else
		{

		 $destinationPath = 'uploads/deposit';
		 $photoExtension = $request->file('deposit_photo')->getClientOriginalExtension(); 
		 $deposit_photo = 'deposit_photo'.\Carbon\Carbon::now()->timestamp.'.'.$photoExtension;
		 $request->file('deposit_photo')->move($destinationPath, $deposit_photo);
		}


		$orderDeposit = OrderDeposit::create([
			'order_id'=>$request->order_id,
			'file_name'=> $deposit_photo ,
			'photo_title'=>$request->file('deposit_photo')->getClientOriginalName(),
		]);

		$orderLog = OrderLog::create([
					'order_id'=>$request->order_id,
					'title'=>'UPLOADED DEPOSIT SLIP',
					'content'=>'<a href="/uploads/deposit/'.$orderDeposit->file_name.'">UPLOADED DEPOSIT SLIP</a>',
				]);
		$order= Order::find($request->order_id);
		$order->status='waiting-approval';
		$order->save();

		

		$user = User::find($order->user_id);
		$billing_address = BillingAddress::find($request->billing_id);			
		$url = URL::to('/');


		$info = array(
			'order_id'=>$order->order_id,
			'user_id'=>$order->user_id,
			'id'=>$order->id,
			'url'=>$url,
			'email'=>$user->email,
			

		); 


		// Mail::send(['html'=>'deposited'], $info, function($message) use ($info) {
		// 		$message->to($info['email'], $info['email'])->subject('Deposit Slip Received');
		// 		$message->from('order@retandro.com','RET & RO Shopping');
		// 	});




		return redirect()->route('my-orders',Auth::user()->id)->with('deposit_slip','Deposit Slip Uploaded');

	}
	public function orderDeposit($id)
	{
		
		$user = User::find(Auth::user()->id);
		$order = Order::find($id);
		return view('orders.deposit', [
			'user'=>$user,
			'order'=>$order,
		]);

	}
	public function printOrder($id)
	{
		$order = Order::find($id);
		$user = User::find($order->user_id);
		$orderItems = OrderItem::with('discount')->where('order_id','=',$id)->get();
		$orderPromo = OrderPromo::where('order_id','=',$id)->get();
		$orderLogs  = OrderLog::where('order_id','=',$id)->orderBy('id','desc')->get();
		return view('orders.print', [
			'user'=>$user,
			'order'=>$order,
			'orderItems'=>$orderItems,
			'orderPromo'=>$orderPromo,
			'orderLogs'=>$orderLogs,
		]);

	}
	public function cancelOrder(Request $request)
	{
		Log::info('asd');
		$order = Order::find($request->orderID);
		$order->status = 'cancelled';
		$order->save();

		$orderLog = OrderLog::create([
					'order_id'=>$request->orderID,
					'title'=>'ORDER CANCELLED',
					'content'=>$request->content."",
				]);

		//  $oi = OrderItem::where('order_id','=',$order->id)->get();
	
		// 	foreach($oi as $o)
		// 	{

		// 		$t = Transaction::where('order_id','=',$order->id)
		// 		// ->where('variation_id','=',$o->variation->id)
		// 		// ->where('user_id','=',$order->user_id)
		// 		// ->where('qty','=',$o->qty)
		// 		->delete();
		// 	}

		return redirect()->back()->with('flash_message','Order Cancelled');

	}
    public function show($id,$order_id)
	{
		$user = User::find($id);
		$order = Order::find($order_id);
		$orderItems = OrderItem::with('discount')->where('order_id','=',$order_id)->get();
		$orderPromo = OrderPromo::where('order_id','=',$order_id)->get();
		$orderLogs  = OrderLog::where('order_id','=',$order_id)->orderBy('id','desc')->get();
	
		
		return view('orders.show', [
			'user'=>$user,
			'order'=>$order,
			'orderItems'=>$orderItems,
			'orderPromo'=>$orderPromo,
			'orderLogs'=>$orderLogs,
		]);

	}

    public function myOrders()
    {
    	$user = User::find(Auth::user()->id);
		$user_orders = Order::where('user_id','=',$user->id)->orderBy('id','desc')->paginate(10);
		return view('orders.index', [
			'user'=>$user,
			'user_orders'=>$user_orders,
		]);
    }
}
