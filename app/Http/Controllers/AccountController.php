<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Log;
use DB;
use Validator;
use Auth;
use View;
use Hash;
use URL;
use Mail;

class AccountController extends Controller
{
    //
     public function register()
    {
        return view('register');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	
		$validator = Validator::make($request->all(), [
			'first_name' => 'required|min:2|max:50',
			'middle_name' => 'required|min:2|max:50',
			'last_name' => 'required|min:2|max:50',
			'email' => 'required|email|unique:users,email',			
			// 'contact' => array('required','numeric','regex:/[0-9]{10}/'),
			'password' => 'required|min:1|max:50',
			'password_confirmation' => 'required|same:password',
		 
		],[
			'contact.numeric' => 'Invalid contact number'
		]);

		if ($validator->fails()) {
			return redirect()
				->route('register')
						->withErrors($validator)
						->withInput();
		}
	 
		DB::beginTransaction();
		try {

		  	$url = URL::to('/');
			$code = str_random(40);	

			$account = User::create([
				'first_name'  =>  $request->input('first_name'),
				'middle_name' => $request->input('middle_name'),
				'last_name' => $request->input('last_name'),
				'email' => $request->input('email'),
				'username' => $request->input('email'),				
				'contact' => $request->input('contact'),
				'password' => Hash::make($request->input('password')),
				'verification_code' => $code,
				
			]);

			DB::table('activity_logs')->insert([
				'username'  => $request->input('email').'@'.\Request::ip(),
				'entry'  =>  'created User :'.$request->input('email'),
				'comment'  =>  '',
				'family'  =>  'insert',
				'created_at' => \Carbon\Carbon::now()
				]);


			$data = array(
							'email'=>$request->email,
							'verification_code'=>$code,
							'url'=>$url,
						); 
			
			// Mail::send(['html'=>'emails.registration'], $data, function($message) use ($data) {
			// 	$message->to($data['email'], $data['email'])->subject('Bikers REGISTRATION CONFIRMATION');
			// 	$message->from('welcome@bikers.com','Bikers REGISTRATION CONFIRMATION');
			// });

			 DB::commit();
			 return redirect('/')->with('email',$request->input('email'))->with('register_ok', 'Please check your email for confirmation');
			
		} catch (\Exception $e) {
			Log::info($e);
			  DB::rollback();
		   return redirect()->route('register')->with('flash_error', 'An Error has Occurred');
		}

	
		
	}
}
