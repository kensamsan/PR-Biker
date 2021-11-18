<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Rentals;
use App\RentalLogs;
use App\BillingAddress;
use App\RentalDeposits;

use DB;
use Session;
use Validator;
use Auth;
use View;
use Carbon\Carbon;
use Log;

class RentalController extends Controller
{
	public function listingDepositSubmit(Request $request)
	{


		$validator = Validator::make($request->all(), [
			'deposit_photo' => 'required',    
			
		]);

		if ($validator->fails()) {
		    return redirect()
		    	->route('listing-deposit',$request->order_id)
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


		$orderDeposit = RentalDeposits::create([
			'rental_id'=>$request->order_id,
			'file_name'=> $deposit_photo ,
			'photo_title'=>$request->file('deposit_photo')->getClientOriginalName(),
		]);

		$orderLog = RentalLogs::create([
					'rental_id'=>$request->order_id,
					'title'=>'UPLOADED DEPOSIT SLIP',
					'content'=>'<a href="/uploads/deposit/'.$orderDeposit->file_name.'">UPLOADED DEPOSIT SLIP</a>',
				]);
		$order= Rentals::find($request->order_id);
		$order->status='waiting-ship';
		$order->save();

		

		return redirect()->route('my-listings',Auth::user()->id)->with('deposit_slip','Deposit Slip Uploaded');

	}
	public function listingShip($id)
	{
		
		
		$rentals = Rentals::find($id);
		$rentals->status='in-transit';
		$rentals->save();
		return redirect()->route('my-listings',Auth::user()->id)->with('flash_success','Shipped! ');


	}
	public function listingDeposit($id)
	{
		
		
		$rentals = Rentals::find($id);
		return view('listings.deposit', [
		
			'rentals'=>$rentals,
		]);

	}

	public function myRentals()
	{
		$listings = Rentals::where('renter_id','=',Auth::user()->id)->orderBy('id','desc')->paginate(10);
        return view('listings.rentals', [
            'listings'=>$listings,
        ]);
	}
	public function clientRentalSubmit(Request $request)
	{
		
		$rental = Rentals::find($request->rental_id);
		$rental->dt_from = $request->dt_from;
		$rental->dt_to = $request->dt_to;
		$rental->renter_id = Auth::user()->id;
		$rental->billing_address_id=$request->billing_id;
		$rental->shipping_type=$request->shipping;
		$rental->payment_method=$request->payment_method;
		$rental->status='waiting';
		$rental->save();

		$orderLog = RentalLogs::create([
					'rental_id'=>$rental->id,
					'title'=>'RENTEE FOUND, NOW WAITING FOR PAYMENT',
					'content'=>'Rentee Found! waiting for rentee deposit',
				]);

    	return redirect()->route('rent-bike')->with('flash_success','Approved');




	}
	public function clientRentalPayment(Request $request)
	{
		

		$rental = Rentals::find($request->rental_id);
		$billingAddress =BillingAddress::where('user_id','=',Auth::user()->id)->get();
		return view('listings.step3',[
			'rental'=>$rental,
			'dt_from'=>$request->dt_from,
			'dt_from_time'=>$request->dt_from_time,
			'dt_to'=>$request->dt_to,
			'dt_to_time'=>$request->dt_to_time,
			'billingAddress'=>$billingAddress,
			]);


	}
	public function clientRentalInformation(Request $request)
	{
	

		$rental = Rentals::find($request->rental_id);
		return view('listings.step2',[
			'rental'=>$rental,
			'dt_from'=>$request->dt_from,
			'dt_from_time'=>$request->dt_from_time,
			'dt_to'=>$request->dt_to,
			'dt_to_time'=>$request->dt_to_time,
			]);
	}

	public function clientRentNow(Request $request)
	{
		// Log::info($request);
		$rental = Rentals::find($request->rental_id);
		return view('listings.step1',[
			'rental'=>$rental,
			]);
	}
	public function detail($id)
	{
		$rental = Rentals::find($id);

		return view('listings.details',[
			'rental'=>$rental,
			]);
	}

	public function cancel($id)
    {
    	$rental = Rentals::find($id);
    	$rental->status = 'cancelled';
    	$rental->save();
    	$orderLog = RentalLogs::create([
					'rental_id'=>$rental->id,
					'title'=>'cancelled,',
					'content'=>'cancelled',
				]);
    	return redirect()->back()->with('flash_success','cancelled');
    	
    }
	public function approvePayment($id)
    {
    	Log::info($id);
    	$rental = Rentals::find($id);
    	$rental->status = 'ship';
    	$rental->payment_status = 'paid';
    	$rental->save();
    	$orderLog = RentalLogs::create([
					'rental_id'=>$rental->id,
					'title'=>'Payment APPROVED,',
					'content'=>'Payment Approved',
				]);
    	return redirect()->back()->with('flash_success','Approved');
    	
    }

    public function view($id)
    {
   
    	$rental = Rentals::find($id);

    	return view('admin.rentals.view', [
			'rental'=>$rental,
			
		]);
    }
   
    public function delivered($id)
    {
    	$rental = Rentals::find($id);
    	$rental->status = 'delivered';
    	$rental->save();
    	$orderLog = RentalLogs::create([
					'rental_id'=>$rental->id,
					'title'=>'RENTAL COMPLETED',
					'content'=>'PRODUCT DELIVERED',
				]);
    	return redirect()->back()->with('flash_success','Delivered');
    	
    }
 
    public function approve($id)
    {
    	$rental = Rentals::find($id);
    	$rental->status = 'posted';
    	$rental->save();
    	$orderLog = RentalLogs::create([
					'rental_id'=>$rental->id,
					'title'=>'ORDER APPROVED, NOW WAITING RENTEE',
					'content'=>'order approved, you can now view your listing',
				]);
    	return redirect()->back()->with('flash_success','Approved');
    	
    }

    //
    public function show($id)
    {
		$rental = Rentals::find($id);
		$rentalLogs = RentalLogs::where('rental_id','=',$id)->get();
    	return view('admin.rentals.show', [
			'rental'=>$rental,
			'rentalLogs'=>$rentalLogs,
		]);
    }

    public function index(Request $request)
	{
		//
		// Log::info($request);
	

		if($request->search=='')
		{
			$rentals = Rentals::paginate(10);
		}
		else
		{
			$rentals = Rentals::Where(function ($query) use ($request) {
				$query->where('bike_name','like', '%'.$request->search.'%')
				->orWhere('bike_unit','like', '%'.$request->search.'%');
			})
			->paginate(10);
		}
		
		// Log::info($p);
		return view('admin.rentals.index', [
			'rentals'=>$rentals,
		]);
	}
}
