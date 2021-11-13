<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\BillingAddress;
use App\User;
use Log;
use DB;
use Validator;
use Auth;
use View;
class BillingAddressController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index($user_id)
	{
		//
		$user = User::find($user_id);
		$billingAddress = BillingAddress::where('user_id','=',$user->id)->get();
		return view('billing-address.index', [
			'user'=>$user,
			'billingAddress'=>$billingAddress,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create($user_id)
	{
		//
		if(Auth::user()->id!=$user_id)
		{
			return abort(404);
		}
		$user = User::find($user_id);
		return view('billing-address.create', [
			'user'=>$user,
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */

		public function addBillingAddressModalFromRent($user_id,Request $request)
	{
		//


		$validator = Validator::make($request->all(), [
				'first_name' => 'required|min:2|max:255',    
			'last_name' => 'required|min:2|max:255',    
			'address' => 'required|min:2|max:255',    
		 
			'brgy' => 'required|min:2|max:255',    
			 
			'zip' => 'required|min:2|max:5',    			
					
			'email' => 'required|email',    			
			'contact' => array('required'),
					
		],[
			'contact.numeric' => 'Invalid contact number'
		]);

		if ($validator->fails()) {
		
			return redirect()
				->route('account.billing-address.create',$user_id)
				->withErrors($validator)
				->withInput();
		}

		$billingCount = BillingAddress::where('user_id','=',$user_id)->count();

		DB::beginTransaction();
		try
		{
			if($billingCount>2)
				{
					return redirect()->route('client-checkout-information')->with('error_message', 'Only Two Billing Address allowed!');
				}
				else 
				{
					$billingAddress = BillingAddress::create([
						'first_name'=>$request->input('first_name'),
						'last_name'=>$request->input('last_name'),
						'address'=>$request->input('address'),
						'brgy'=>$request->input('brgy'),
						'city'=>$request->input('city'),
						'zip'=>$request->input('zip'),
						'region'=>$request->input('region'),
						'email'=>$request->input('email'),
						'landmark'=>$request->input('landmark'),
						'contact'=>$request->input('contact'),
						'type'=>$request->input('type'),
						'user_id'=>$user_id,
						]);
					DB::table('activity_logs')->insert([
						'username'  =>  Auth::user()->username.'@'.\Request::ip(),
						'entry'  =>  'added billing-address for user :'.$user_id,
						'comment'  =>  '',
						'family'  =>  'insert',
						'created_at' => \Carbon\Carbon::now()
						]);
					DB::commit();

					return redirect()->route('profile')->with('flash_message', 'Shipping Address Added!!');
				}
				
			
		}
		catch(\Exception $e)
		{
			
			DB::rollback();
			Log::info($e->getMessage());
		}
		catch(\Throwable $e)
		{
			DB::rollback();
			Log::info($e->getMessage());
		}

		

		


	}



	public function addBillingAddressModal($user_id,Request $request)
	{
		//


		$validator = Validator::make($request->all(), [
			'first_name' => 'required|min:2|max:255',    
			'last_name' => 'required|min:2|max:255',    
			'address' => 'required|min:2|max:255',    
		 
			'brgy' => 'required|min:2|max:255',    
			 
			'zip' => 'required|min:2|max:5',    			
					
			'email' => 'required|email',    			
			'contact' => array('required'),
					
		],[
			'contact.numeric' => 'Invalid contact number'
		]);

		if ($validator->fails()) {
		
			return redirect()
				->route('account.billing-address.create',$user_id)
				->withErrors($validator)
				->withInput();
		}

		$billingCount = BillingAddress::where('user_id','=',$user_id)->count();

		DB::beginTransaction();
		try
		{
			if($billingCount>2)
				{
					return redirect()->route('client-checkout-information')->with('error_message', 'Only Two Billing Address allowed!');
				}
				else 
				{
					$billingAddress = BillingAddress::create([
						'first_name'=>$request->input('first_name'),
						'last_name'=>$request->input('last_name'),
						'address'=>$request->input('address'),
						'brgy'=>$request->input('brgy'),
						'city'=>$request->input('city'),
						'zip'=>$request->input('zip'),
						'region'=>$request->input('region'),
						'email'=>$request->input('email'),
						'landmark'=>$request->input('landmark'),
						'contact'=>$request->input('contact'),
						'type'=>$request->input('type'),
						'user_id'=>$user_id,
						]);
					DB::table('activity_logs')->insert([
						'username'  =>  Auth::user()->username.'@'.\Request::ip(),
						'entry'  =>  'added billing-address for user :'.$user_id,
						'comment'  =>  '',
						'family'  =>  'insert',
						'created_at' => \Carbon\Carbon::now()
						]);
					DB::commit();

					return redirect()->route('client-checkout-information')->with('flash_message', 'Shipping Address Added!!');
				}
				
			
		}
		catch(\Exception $e)
		{
			
			DB::rollback();
			Log::info($e->getMessage());
		}
		catch(\Throwable $e)
		{
			DB::rollback();
			Log::info($e->getMessage());
		}

		

		


	}

	public function addBillingContactModal($user_id,Request $request)
	{

		$validator = Validator::make($request->all(), [
			'contact' => array('required','numeric','regex:/[0-9]{10}/'),
		],[
			'contact.numeric' => 'Invalid contact number'
		]);

		if ($validator->fails()) {
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}

		$user = User::find($user_id);
		$user->contact = $request->contact;
		$user->save();

		return redirect()->back()->with('flash_message', 'Contact Number Updated!!');


	}


	public function store($user_id,Request $request)
	{
		//
		// Log::info($request);
		

		$validator = Validator::make($request->all(), [
			
			'address' => 'required|min:2|max:255',    
		 
			'brgy' => 'required|min:2|max:255',    
			 
			'zip' => 'required|min:2|max:5',    			
					
		
			'contact' => array('required'),   			
		],[
			'contact.numeric' => 'Invalid contact number'
		]);

		if ($validator->fails()) {
			return redirect()
				->route('account.billing-address.create',$user_id)
				->withErrors($validator)
				->withInput();
		}

		$billingAddress = BillingAddress::create([
			'first_name'=>$request->input('first_name'),
			'last_name'=>$request->input('last_name'),
			'address'=>$request->input('address'),
			'brgy'=>$request->input('brgy'),
			'city'=>$request->input('city'),
			'landmark'=>$request->input('landmark'),
			'zip'=>$request->input('zip'),
			'region'=>$request->input('region'),
			'email'=>$request->input('email'),
			'contact'=>$request->input('contact'),
			'type'=>$request->input('type'),
			'user_id'=>$user_id,
			]);
		// DB::table('activity_log')->insert([
		// 	'username'  =>  Auth::user()->username.'@'.\Request::ip(),
		// 	'entry'  =>  'added billing-address for user :'.$user_id,
		// 	'comment'  =>  '',
		// 	'family'  =>  'insert',
		// 	'created_at' => \Carbon\Carbon::now()
		// 	]);


		return redirect()->route('account.billing-address.index',$user_id)->with('flash_message', 'Billing Address Added!!');


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($user_id,$id)
	{
		//
		if(Auth::user()->id!=$user_id)
		{
			return abort(404);
		}
		$user = User::find($user_id);
		$billingAddress = BillingAddress::find($id);
		return view('billing-address.edit', [
			'user'=>$user,
			'billingAddress'=>$billingAddress,
		]);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update($user_id,Request $request, $id)
	{
		//
		// Log::info($request);
		$validator = Validator::make($request->all(), [
			
			'address' => 'required|min:2|max:255',    
			'brgy' => 'required|min:2|max:255',    
		
			'zip' => 'required|min:2|max:5',    			
			
				
		
			'type' => 'required',    					
		]);

		if ($validator->fails()) {
			return redirect()
				->route('account.billing-address.edit',[$user_id,$id])
				->withErrors($validator)
				->withInput();
		}

		$billingAddress = BillingAddress::find($id);
		$billingAddress->first_name = $request->first_name;
		$billingAddress->last_name = $request->last_name;
		$billingAddress->brgy = $request->brgy;
		$billingAddress->address = $request->address;
		$billingAddress->region = $request->region;
		$billingAddress->type = $request->type;
		$billingAddress->city = $request->city;
		$billingAddress->landmark = $request->landmark;
		$billingAddress->email = $request->email;
		$billingAddress->type = $request->type;
		$billingAddress->contact = $request->contact;
		$billingAddress->save();

		// DB::table('activity_log')->insert([
		// 	'username'  =>  Auth::user()->username.'@'.\Request::ip(),
		// 	'entry'  =>  'updated billing-address for user :'.$user_id,
		// 	'comment'  =>  '',
		// 	'family'  =>  'update',
		// 	'created_at' => \Carbon\Carbon::now()
		// 	]);


		return redirect()->route('account.billing-address.index',$user_id)->with('flash_message', 'Billing Address Updated!!');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
