<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Category;
use App\Province;
use App\Rentals;
use App\RentalImages;
use App\RentalLogs;
use DB;
use Hash;
use Validator;
use Auth;
use Log;
use Session;
class HomeController extends Controller
{
     public function rentBike()
    {
        $rentals = Rentals::where('status','=','posted')->get();
      
         return view('rent-bike',[
            'rentals'=>$rentals,
            ]);
    }

    public function showListings($id)
    {
        $rentals = Rentals::findOrFail($id);
        if($rentals->user_id!=Auth::user()->id)
        {
             abort(404);
        }
        $rentalLogs =RentalLogs::where('rental_id','=',$rentals->id)->get();

        return view('listings.show', [       
            'listing'=>$rentals,
            'rentalLogs'=>$rentalLogs,
        ]);
       
        
    }
    public function listings()
    {


        $listings = Rentals::where('user_id','=',Auth::user()->id)->orderBy('id','desc')->paginate(10);
        return view('listings.index', [
            'listings'=>$listings,
        ]);
    }
    public function postBikeSubmit(Request $request)
    {
  

        $validator = Validator::make($request->all(), [
            'bike_name' => 'required',    
            
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route()
                ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        DB::beginTransaction();
            try
            {
                $rental = Rentals::create([
                    'user_id'=>Auth::user()->id,
                    'bike_name'=>$request->bike_name,
                    'bike_unit'=>$request->bike_unit,
                    'price'=>$request->price,
                    'city_id'=>$request->city,
                    'description'=>$request->description,                  
                    'status'=>'waiting-approval',                  

                    ]);

                $rentalLog = RentalLogs::create([
                    'rental_id'=>$rental->id,
                    'title'=>'Listing Created',
                    'content'=>'Listing Created, Waiting for admin Approval',
                ]);

                $ct = 0;
                foreach($request->images as $x)
                {
                    $destinationPath = 'uploads/rentals';
                    $photoExtension = $x->getClientOriginalExtension(); 
                    $filename = 'rental_photo'.Auth::user()->id.'_'.$ct.'-'.\Carbon\Carbon::now()->timestamp.'.'.$photoExtension;
                    RentalImages::create([
                        'rental_id'=>$rental->id,
                        'file_original_name'=>$x->getClientOriginalName(),
                        'file_name'=>$filename,
                        ]);
                    Log::info($x);

                    $x->move($destinationPath, $filename);

                    $ct = $ct+1;
                }
                
            
                DB::commit();
                return redirect()->route('rent')->with('flash_message', 'Rental Added!!');
            }
            catch(\Exception $e)
            {
                DB::rollback();
                Log::alert($e);
                abort(500);
            }
            catch(\Throwable $e)
            {
                DB::rollback();
                Log::alert($e);
                abort(500);
            }
        

    }
    public function postBike()
    {
        $provinces = Province::get();
        return view('post-bike',[
            'provinces'=>$provinces,
            ]);

    }
    public function rent()
    {
        return view('rent',[

            ]);
    }
    public function marketplace()
    {
    	$products = Product::where('visibility','=','active')->get();
    	$categories = Category::get();
    	 return view('marketplace',[
    	 	'products'=>$products,
    	 	'categories'=>$categories,
            ]);
    }
    public function home()
    {
    	$product = Product::where('listing','=','products')->get();
       
        return view('home',[
            'products'=>$product
            ]);
    }
}
