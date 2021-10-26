<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Variable;
use App\ActivityLog;
use App\User;
use DB;
use Hash;
use Validator;
use Auth;
use Log;
use Session;
class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $software_name = Variable::where('name','=','software_name')->first();
        $software_description = Variable::where('name','=','software_description')->first();
        $software_logo = Variable::where('name','=','software_logo')->first();
        $company_name = Variable::where('name','=','company_name')->first();
        $company_address = Variable::where('name','=','company_address')->first();
        $company_phone = Variable::where('name','=','company_phone')->first();
        $letter_header = Variable::where('name','=','letter_header')->first();
        $report_footer = Variable::where('name','=','report_footer')->first();
        $company_logo = Variable::where('name','=','company_logo')->first();
        return view('admin.settings',[
            'software_name'=>$software_name,
            'software_description' => $software_description,
            'software_logo' => $software_logo,
            'company_name'=>$company_name,
            'company_address'=>$company_address,
            'company_phone'=>$company_phone,
            'letter_header'=>$letter_header,
            'company_logo'=>$company_logo,
            'report_footer'=>$report_footer,
        ]);
    }
    public function manageProfile()
    {
        $user = User::whereNull('deleted_at')->where('id',Auth::id())->firstOrFail();
        return view('admin.manage_profile.profile',compact('user'));
    }
    public function editName()
    {
        $user = User::whereNull('deleted_at')->where('id',Auth::id())->firstOrFail();
        return view('admin.manage_profile.edit_name',compact('user'));
    }
    public function updateName(Request $request)
    {
        $user = User::whereNull('deleted_at')->where('id',Auth::id())->firstOrFail();
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'middle_name' => 'required|max:255',
            'last_name' => 'required|max:255',
        ]);
        if ($validator->fails())
        {
            return redirect()->route('settings.edit.name')
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            DB::beginTransaction();
            try
            {
                $user->first_name = $request->first_name;
                $user->middle_name = $request->middle_name;
                $user->last_name = $request->last_name;
                $user->save();
                $user_profile_activity_log = ActivityLog::create([
                    'user_id' => Auth::user()->id,
                    'username' => Auth::user()->username.'@'.\Request::ip(),
                    'entry' => 'Updated name of user '.$user->first_name.' '.$user->last_name.' with id '.$user->id,
                    'comment' => '',
                    'family' => 'update',
                ]);
                DB::commit();
                return redirect()->route('settings.index')->with('flash_message', 'Name Updated!!');
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
    public function editUsername()
    {
        $user = User::whereNull('deleted_at')->where('id',Auth::id())->firstOrFail();
        return view('admin.manage_profile.edit_username',compact('user'));
    }
    public function updateUsername(Request $request)
    {
        $user = User::whereNull('deleted_at')->where('id',Auth::id())->firstOrFail();
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:4|unique:users,username,'.Auth::id().',id,deleted_at,NULL',
        ]);
        if ($validator->fails())
        {
            return redirect()->route('settings.edit.username')
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            DB::beginTransaction();
            try
            {
                $user->username = $request->username;
                $user->save();
                $user_profile_activity_log = ActivityLog::create([
                    'user_id' => Auth::user()->id,
                    'username' => Auth::user()->username.'@'.\Request::ip(),
                    'entry' => 'Updated username of user '.$user->first_name.' '.$user->last_name.' with id '.$user->id,
                    'comment' => '',
                    'family' => 'update',
                ]);
                DB::commit();
                return redirect()->route('settings.index')->with('flash_message', 'Username Updated!!');
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
    public function editEmail()
    {
        $user = User::whereNull('deleted_at')->where('id',Auth::id())->firstOrFail();
        return view('admin.manage_profile.edit_email',compact('user'));
    }
    public function updateEmail(Request $request)
    {
        $user = User::whereNull('deleted_at')->where('id',Auth::id())->firstOrFail();
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email,'.Auth::id().',id,deleted_at,NULL',
        ]);
        if ($validator->fails())
        {
            return redirect()->route('settings.edit.email')
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            DB::beginTransaction();
            try
            {
                $user->email = $request->email;
                $user->save();
                $user_profile_activity_log = ActivityLog::create([
                    'user_id' => Auth::user()->id,
                    'username' => Auth::user()->username.'@'.\Request::ip(),
                    'entry' => 'Updated email of user '.$user->first_name.' '.$user->last_name.' with id '.$user->id,
                    'comment' => '',
                    'family' => 'update',
                ]);
                DB::commit();
                return redirect()->route('settings.index')->with('flash_message', 'Email Updated!!');
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
    public function editPassword()
    {
        $user = User::whereNull('deleted_at')->where('id',Auth::id())->firstOrFail();
        return view('admin.manage_profile.edit_password',compact('user'));
    }
    public function updatePassword(Request $request)
    {
        $user = User::whereNull('deleted_at')->where('id',Auth::id())->firstOrFail();
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|max:50|min:4',    
            'new_password' => 'required|min:4|max:50|confirmed', 
        ]);
        if ($validator->fails())
        {
            if(!hash::check($request->input('old_password'),$user->password))
            {
                $validator->errors()->add('old_password','Your old password is incorrect.');
            }
            return redirect()->route('settings.edit.password')
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            if(hash::check($request->input('old_password'),$user->password))
            {
                DB::beginTransaction();
                try
                {
                    $user->password = hash::make($request->input('new_password'));
                    $user->save();
                    $user_profile_activity_log = ActivityLog::create([
                        'user_id' => Auth::user()->id,
                        'username' => Auth::user()->username.'@'.\Request::ip(),
                        'entry' => 'Updated password of user '.$user->first_name.' '.$user->last_name.' with id '.$user->id,
                        'comment' => '',
                        'family' => 'update',
                    ]);
                    DB::commit();
                    return redirect()->route('settings.index')->with('flash_message', 'Password Updated!!');
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
            else
            {
                $validator->errors()->add('old_password','Your old password is incorrect.');
                return redirect()->route('settings.edit.password')
                ->withErrors($validator)
                ->withInput();
            }
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        DB::beginTransaction();
        try
        {   
            $i=0;
            for($i=0;$i<count($request->input('settings_name'));$i++)
            {
                $settings_name = $request->input('settings_name')[$i];
                $settings_id = $request->input('settings_id')[$i];
                if($settings_name=='company_logo')
                {

                    if($request->hasFile('photo_company'))
                    {
                        $x = Variable::find($settings_id);
                        //Storage::disk('uploads')->delete($x->value);
                        if(file_exists('uploads/'.$x->value))
                        {
                            if(unlink('uploads/'.$x->value))
                            {
                                $activity_log = new ActivityLog();
                                $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                                $activity_log->entry = 'Deleted image '.$x->value.' for company logo';
                                $activity_log->comment = '';
                                $activity_log->family = 'delete';
                                $activity_log->created_at = \Carbon\Carbon::now();
                                $activity_log->save();

                            }
                        }
                        $destinationPath = 'uploads'; // upload path
                        $photoExtension = $request->file('photo_company')->getClientOriginalExtension(); 

                        $photoFileName = $request->input('settings_name')[$i].".".$photoExtension;
                        $request->file('photo_company')->move($destinationPath, $photoFileName);
                        $x->value = $photoFileName;
                        $x->save(); 
                    }
                        
                }
                else if($settings_name=='software_logo')
                {

                    if($request->hasFile('photo_software'))
                    {
                        $x = Variable::find($settings_id);
                        //Storage::disk('uploads')->delete($x->value);
                        if(file_exists('uploads/'.$x->value))
                        {
                            if(unlink('uploads/'.$x->value))
                            {
                                $activity_log = new ActivityLog();
                                $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                                $activity_log->entry = 'Deleted image '.$x->value.' for software logo';
                                $activity_log->comment = '';
                                $activity_log->family = 'delete';
                                $activity_log->created_at = \Carbon\Carbon::now();
                                $activity_log->save();

                            }
                        }
                        $destinationPath = 'uploads'; // upload path
                        $photoExtension = $request->file('photo_software')->getClientOriginalExtension(); 

                        $photoFileName = $request->input('settings_name')[$i].".".$photoExtension;
                        $request->file('photo_software')->move($destinationPath, $photoFileName);
                        $x->value = $photoFileName;
                        $x->save(); 
                    }
                }
                else
                {
                    $x = Variable::find($settings_id);
                    $x->value = $request->input($settings_name);
                    $x->save();     
                }
                
            }

            $var = Variable::all();
            foreach ($var as $x) {
                session([$x->name => $x->value]); 
            }
            $activity_log = new ActivityLog();
            $activity_log->username = Auth::user()->username.'@'.\Request::ip();
            $activity_log->entry = 'Updated application settings';
            $activity_log->comment = '';
            $activity_log->family = 'update';
            $activity_log->created_at = \Carbon\Carbon::now();
            $activity_log->save();
            DB::commit();
            return redirect('settings')->with('flash_message', 'Settings Updated!!');
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
