<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\ActivityLog;
use App\Role;
use App\RoleUser;
use App\Privilege;
use App\PrivilegeRole;
use App\Variable;
use App\PasswordReset;
use Validator;
use DB;
use Log;
use Response;
use Session;
use Hash;
use Mail;
use Carbon\Carbon;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function login(){
        return view('index');
    }
    public function logout()
    {
        if(Auth::check())
        {
            Session::flash('flash_success',session('status'));
            //Log::info('*******Logging IN *********'.Input::get('username'));
            $activity_log = new ActivityLog();
            $activity_log->user_id = Auth::user()->id;
            $activity_log->username =  Auth::user()->username.'@'.\Request::ip();
            $activity_log->entry = 'logout';
            $activity_log->comment = '';
            $activity_log->family = 'logout';
            $activity_log->save();
            auth()->logout();
        }
        return redirect('/login');
    }

    public function authenticate(Request $request)
    {
        // Log::info($request);
        $credentials = [
            'username' => Input::get('username'),
            'password' => Input::get('password'),
            'active' => 1,
        ];
        $user = User::where('username','=',Input::get('username'))->whereNull('deleted_at')->first();
        if(!empty($user))
        {
            if(!hash::check(Input::get('password'),$user->password))
            {
                $activity_log = new ActivityLog();
                $activity_log->username =  $request->input('username').'@'.\Request::ip();
                $activity_log->entry = 'login-failure';
                $activity_log->comment = '';
                $activity_log->family = 'login-failure';
                $activity_log->save();
                //return Response::json(array('success' => false));
                return redirect()->back()->with('flash_error','Wrong username and password. Please try again');
            }
            else
            {
                if($user->active == 0)
                {
                    $activity_log = new ActivityLog();
                    $activity_log->username =  $request->input('username').'@'.\Request::ip();
                    $activity_log->entry = 'login-failure';
                    $activity_log->comment = '';
                    $activity_log->family = 'login-failure';
                    $activity_log->save();
                    //return Response::json(array('success' => false));
                    return redirect()->back()->with('flash_error','Your account is deactivated.');
                }
                else
                {
                    if(!Auth::attempt($credentials))
                    {
                        $activity_log = new ActivityLog();
                        $activity_log->username =  $request->input('username').'@'.\Request::ip();
                        $activity_log->entry = 'login-failure';
                        $activity_log->comment = '';
                        $activity_log->family = 'login-failure';
                        $activity_log->save();
                        //return Response::json(array('success' => false));
                        return redirect()->back()->with('flash_error','Wrong username and password/account is deactivated. Please try again');
                    }
                    else
                    {

                        $privileges = Privilege::get();
                        foreach ($privileges as $privilege) {
                            $privilegeText = ''.$privilege->name;
                            $this->checkIfExist($privilegeText);
                            $p = User::find(Auth::user()->id)->checkPrivileges($privilegeText);
                            session([$privilegeText =>  $p]); 
                        }

                        $var = Variable::all();
                        foreach ($var as $x) {
                            session([$x->name=>$x->value]); 

                        }\
                        Session(['username' =>  Input::get('username')]); 

                        $this->checkIfExistVar('software_name','','Software Name');
                        $this->checkIfExistVar('software_description','','Software Description');
                        $this->checkIfExistVar('software_logo','','Software Logo');
                        $this->checkIfExistVar('company_name','','Company Name');
                        $this->checkIfExistVar('company_address','','Company Address');
                        $this->checkIfExistVar('company_phone','','Company Phone');
                        $this->checkIfExistVar('company_logo','','Company Logo');
                        $this->checkIfExistVar('letter_header','','Letter Header');
                        $this->checkIfExistVar('report_footer','','Report Footer');

                        $activity_log = new ActivityLog();
                        $activity_log->user_id = Auth::user()->id;
                        $activity_log->username =  Auth::user()->username.'@'.\Request::ip();
                        $activity_log->entry = 'login-success';
                        $activity_log->comment = '';
                        $activity_log->family = 'login-success';
                        $activity_log->save();
                        if($user->hasRole('superuser')==1)
                        {
                            return redirect()->route('dashboard.index')->with('flash_message','Logged In!');
                        }
                        else
                        {
                             return redirect('/')->with('flash_message','Logged In!');
                        }
                        
                    }
                }
            }
        }
        else
        {
            $activity_log = new ActivityLog();
            $activity_log->username =  $request->input('username').'@'.\Request::ip();
            $activity_log->entry = 'login-failure';
            $activity_log->comment = '';
            $activity_log->family = 'login-failure';
            $activity_log->save();
            //return Response::json(array('success' => false));
            return redirect()->back()->with('flash_error','Wrong username and password. Please try again');
        }
    } 

    function checkIfExist($x)
    {
        $user = Privilege::firstOrNew(array('name' => $x));
        $user->name = $x;
        $user->save();
    }
    

    function checkIfExistVar($name,$value,$description)
    {
        $var = Variable::firstOrNew(array('name' => $name));
        $var->name = $name;
        $var->description = $description;
        if($value!='')
        $var->value = $value;
        $var->save();
    }
    public function forgotPassword()
    {
        $var = Variable::all();
        foreach ($var as $x) {
            session([$x->name=>$x->value]); 

        }
        return view('admin.passwords.email');
    }
    public function requestToken(Request $request)
    {
        $messages = [
            'email.exists' => 'Email does not exist.'
        ];
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|exists:users,email,deleted_at,NULL',
        ],$messages);
        if($validator->fails())
        {
            return redirect()
                ->route('user.forgot.password')
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            DB::beginTransaction();
            try
            {
                $software_name = Session::get('software_name');
                $token = PasswordReset::where('email',$request->email)->first();
                if(empty($token))
                {
                    $password_reset = new PasswordReset();
                    $password_reset->email = $request->email;
                    $password_reset->token = str_random(60);
                    $password_reset->save();  
                }
                else
                {
                    DB::table('password_resets')->where('email', $request->email)->update(['token' => str_random(60)]);
                }
                DB::commit();
                $tokenData  = PasswordReset::where('email',$request->email)->first();
                $user = User::where('email',$request->email)->whereNull('deleted_at')->first();
                Mail::send('admin.emails.password', ['tokenData' => $tokenData,'user'=>$user], function ($m) use ($tokenData,$user,$software_name) {
                    $m->from('covid_tracer.support@aguora.com', $software_name);
                    $m->to($tokenData->email, $user->first_name.' '.$user->last_name)->subject('Password Reset!');
                });
                return redirect()->route('user.forgot.password')->with('flash_message',$request->email);
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
    }
    public function resetPassword(Request $request,$token)
    {
        $var = Variable::all();
        foreach ($var as $x) {
            session([$x->name=>$x->value]); 

        }
        $password_token = PasswordReset::where(['email'=>$request->email,'token'=>$token])->first();
        if(!empty($password_token))
        {
            return view('admin.passwords.reset_password',
                [
                    'tokenData' => $password_token,
                ]);
        }
        else
        {
            return redirect()
                ->route('user.forgot.password')->with('flash_error','Your token is already expired.');
        }
    }
    public function resetPasswordUpdate(Request $request,$token,$email)
    {
        $password_token = PasswordReset::where(['email'=>$email,'token'=>$token])->first();
        if(!empty($password_token))
        {
            $user = User::where('email','=',$email)->whereNull('deleted_at')->firstOrFail();
            $validator = Validator::make($request->all(), [   
                'new_password' => 'required|min:4|max:50|confirmed', 
            ]);
            
            if($validator->fails())
            {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            else
            {
                DB::beginTransaction();
                try
                {
                    $user->password = hash::make($request->input('new_password'));
                    $user->save();
                    $activity_log = new ActivityLog();
                    $activity_log->username = $user->username.'@'.\Request::ip();
                    $activity_log->entry = 'Reset password success for user: '.$user->first_name.' '.$user->middle_name.' '.$user->last_name.' with id:'.$user->id;
                    $activity_log->comment = '';
                    $activity_log->family = 'update';
                    $activity_log->created_at = \Carbon\Carbon::now();
                    $activity_log->save();
                    DB::table('password_resets')->where('email','=',$email)->delete();
                    DB::commit();
                    return redirect()->route('user.login')->with('flash_message', 'Your password has been reset successfully!!');
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
        }
        else
        {
            return redirect()
                ->route('user.forgot.password')->with('flash_error','Your token is already expired.');
        }
    }
}
