<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Validator;

class UserController extends Controller
{
    protected function authenticate(Request $req){
      $validator = Validator::make($req->all(),[
        'email' => 'required|email',
        'password' => 'required',
      ]);

        $credentials = [
            'email' => Input::get('email'),
            'password' => Input::get('password')
          ];

        if (Auth::attempt($credentials)) {
            return redirect()
              ->intended('/');
          }
          else {
            auth()->logout();
            return redirect()
              ->back()
              ->with('flash_error', 'Wrong email/password!')
              ->withInput(Input::all());
          }
    }

    protected function logout(){
      Auth::logout();
      return redirect()->route('out');
    }

    public function store(request $request){
      $name=$request->input('name');
      $email=$request->input('email');
      $password=$request->input('password');
      echo DB::insert('insert into user(id,name,email,passowrd) values(?,?,?,?)',[null,$name,$email,$password]);
    }

}
