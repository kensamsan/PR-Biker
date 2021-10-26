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


		

	  
		return view('admin-orders.list_admin-orders', [
			'orders'=>$orders,
			'type'=>$type,
		]);
	}
}
