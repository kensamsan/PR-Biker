<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\City;

use App\CheckPoint;
use DB;
use Hash;
use Validator;
use Auth;
use Log;
use Response;
use Session;
use Illuminate\Support\Facades\Input;
use PDF;
use QrCode;
use Mail;
use URL;
class JsonController extends Controller
{
    //
    public function mobileRemarks(Request $request )
    {
        
        $tp =TravelPass::where('tracking_no','=',$request->id)->first();
        $tp->remarks = $request->remarks;
        $tp->save();
        $t =  TravelPassTransaction::create([
                        'travel_pass_id' => $tp->id,
                        'status' => 'exit',                            
                        'description' => 'Checkpoint Remark :'.$tp->remarks,
                    ]);
        return Response::json(['success' => true], 200,[],JSON_PRETTY_PRINT);
    }
    public function fetchCities($id)
    {
        $cities =City::where('province_id','=',$id)->get();
        return Response::json(['success' => true,'cities'=>$cities], 200,[],JSON_PRETTY_PRINT);
    }
    public function mobileLogin(Request $request)
    {
        $credentials = [
            'username' => Input::get('username'),
            'password' => Input::get('password'),
        ];
        $user = User::where('username','=',Input::get('username'))->whereNull('deleted_at')->first();
        if(!empty($user))
        {
           return Response::json(['success' => true], 200,[],JSON_PRETTY_PRINT);
        }
        else
        {
             return Response::json(['success' => false], 200,[],JSON_PRETTY_PRINT);
        }
    }
  
   


   
}
