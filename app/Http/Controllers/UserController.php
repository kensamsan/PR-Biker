<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Http\Requests;
use App\Role;
use App\User;
use App\ActivityLog;
use App\Variable;
use App\Privilege;
use DB;
use Hash;
use Validator;
use Auth;
use Log;
use Session;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index(Request $request)
    {
        //

        $users = User::whereNull('deleted_at')        
            ->get();
        return view('admin.users.index',
            [
                'users' => $users,
            ]
        );
    }
    
    public function login()
    {
        if(Auth::check())
        {

        }
        else
        {
            $var = Variable::all();
            foreach ($var as $x) {
                session([$x->name=>$x->value]); 

            }
            return view('login');
        }
    }
    // public function admin()
    // {
    //     if(Auth::check())
    //     {

    //     }
    //     else
    //     {
    //         $var = Variable::all();
    //         foreach ($var as $x) {
    //             session([$x->name=>$x->value]); 

    //         }
    //         return view('admin-login');
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create_users');
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
            'first_name' => 'required|max:255',
            'middle_name' => 'max:255',
            'last_name' => 'required|max:255',
            'photo' => 'image|mimes:jpeg,jpg,png',
            'username' => 'required|min:4|unique:users,username,NULL,id,deleted_at,NULL',
            'password' => 'required|min:4|max:50|confirmed',
            'email_address' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
        ]);
        if ($validator->fails())
        {
            return redirect()->route('settings.users.create')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $photo_temp = '';
            DB::beginTransaction();
            try
            {
                $user = new User();
                $user->first_name = ucwords($request->first_name);
                $user->middle_name = ucwords($request->middle_name);
                $user->last_name = ucwords($request->last_name);
                $user->password = hash::make($request->password);
                $user->username = $request->username;
                $user->email = $request->email_address;
                $user->contact = $request->contact_no;
                $user->active = 1;
                $user->save();
                if($request->hasFile('photo'))
                {
                    if($request->photo->isValid())
                    {
                        $destinationPath = 'uploads/users';
                        $photoExtension = $request->photo->getClientOriginalExtension(); 
                        $filename = 'user_photo_'.$user->id.'_'.\Carbon\Carbon::now()->timestamp.'.'.$photoExtension;
                        $request->file('photo')->move($destinationPath, $filename);
                        // Storage::disk('users')->put($filename,file_get_contents($request->photo->getRealPath()));
                        if(file_exists('uploads/users/'.$filename))
                        {
                            $photo_temp = $filename;
                            $activity_log = new ActivityLog();
                            $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                            $activity_log->entry = 'Added image '.$filename.' for user '.$user->id;
                            $activity_log->comment = '';
                            $activity_log->family = 'insert';
                            $activity_log->created_at = \Carbon\Carbon::now();
                            $activity_log->save();
                        }
                        else
                        {
                            DB::rollback();
                            return redirect()->back()
                                ->withErrors(['errors' =>  ['There were problems uploading the image. Please try again. ']]);
                        }
                    }
                    else
                    {
                        DB::rollback();
                        return redirect()->back()
                            ->withErrors(['errors' =>  ['Uploaded file is not a valid file. Please try again. ']]);
                    }
                }
                else
                {
                    $photo_temp = 'anon.png';
                }
                $user->photo = $photo_temp;
                $user->save();
                $activity_log = new ActivityLog();
                $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                $activity_log->entry = 'Added user: '.$user->first_name.' '.$user->middle_name.' '.$user->last_name.' with id:'.$user->id;
                $activity_log->comment = '';
                $activity_log->family = 'insert';
                $activity_log->created_at = \Carbon\Carbon::now();
                $activity_log->save();
                DB::commit();
                return redirect()->route('settings.users.index')->with('flash_message', 'User Added!!');
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
        $user = User::where('id',$id)->firstOrFail();
        return view('admin.users.edit_users',
                [
                    'user' => $user
                ]
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'middle_name' => 'max:255',
            'last_name' => 'required|max:255',
            'photo' => 'image|mimes:jpeg,jpg,png',
            'username' => 'required|min:4|unique:users,username,'.$id.',id,deleted_at,NULL',
            'email' => 'required|email|unique:users,email,'.$id.',id,deleted_at,NULL',
        ]);
        if ($validator->fails())
        {
            return redirect()->route('settings.users.edit',$id)
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $photo_temp = '';
            $user =  User::where('id',$id)->firstOrFail();
            DB::beginTransaction();
            try
            {
                $user->first_name = ucwords($request->first_name);
                $user->middle_name = ucwords($request->middle_name);
                $user->last_name = ucwords($request->last_name);
                $user->username = $request->username;
                $user->email = $request->email;
                $user->contact = $request->contact;
                $user->save();
                if($request->hasFile('photo'))
                {
                    if($request->photo->isValid())
                    {
                        if($user->photo != 'anon.png')
                        {
                            if(file_exists('uploads/users/'.$user->photo))
                            {
                                if(unlink('uploads/users/'.$user->photo))
                                {
                                    $activity_log = new ActivityLog();
                                    $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                                    $activity_log->entry = 'Deleted image '.$user->photo.' for user '.$user->id;
                                    $activity_log->comment = '';
                                    $activity_log->family = 'delete';
                                    $activity_log->created_at = \Carbon\Carbon::now();
                                    $activity_log->save();
                                }
                            }
                            // Storage::disk('users')->delete($user->photo);
                        }
                        $destinationPath = 'uploads/users';
                        $photoExtension = $request->photo->getClientOriginalExtension(); 
                        $filename = 'user_photo_'.$user->id.'_'.\Carbon\Carbon::now()->timestamp.'.'.$photoExtension;
                        $request->file('photo')->move($destinationPath, $filename);
                        // Storage::disk('users')->put($filename,file_get_contents($request->photo->getRealPath()));
                        if(file_exists('uploads/users/'.$filename))
                        {
                            $photo_temp = $filename;
                            $activity_log = new ActivityLog();
                            $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                            $activity_log->entry = 'Added image '.$filename.' for user '.$user->id;
                            $activity_log->comment = '';
                            $activity_log->family = 'insert';
                            $activity_log->created_at = \Carbon\Carbon::now();
                            $activity_log->save();
                            $user->photo = $photo_temp;
                            $user->save();
                        }
                        else
                        {
                            DB::rollback();
                            return redirect()->back()
                                ->withErrors(['errors' =>  ['There were problems uploading the image. Please try again. ']]);
                        }
                    }
                    else
                    {
                        DB::rollback();
                        return redirect()->back()
                            ->withErrors(['errors' =>  ['Uploaded file is not a valid file. Please try again. ']]);
                    }
                } 
                $activity_log = new ActivityLog();
                $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                $activity_log->entry = 'Updated user: '.$user->first_name.' '.$user->middle_name.' '.$user->last_name.' with id:'.$user->id;
                $activity_log->comment = '';
                $activity_log->family = 'update';
                $activity_log->created_at = \Carbon\Carbon::now();
                $activity_log->save();
                DB::commit();
                return redirect()->route('settings.users.index')->with('flash_message', 'User Updated!!');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::where('id',$id)->firstOrFail();
        if($user->id === Auth::user()->id)
        {
            return redirect()->back()
                ->withErrors(['errors' => ['Warning: You cannot delete your own account.']]);
        }
        else
        {
            if($user->status === 0 )
            {
                DB::beginTransaction();
                try
                {
                    if($user->photo != 'anon.png')
                    {
                        if(file_exists('uploads/users/'.$user->photo))
                        {
                            if(unlink('uploads/users/'.$user->photo))
                            {
                                $activity_log = new ActivityLog();
                                $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                                $activity_log->entry = 'Deleted image '.$user->photo.' for user '.$user->id;
                                $activity_log->comment = '';
                                $activity_log->family = 'delete';
                                $activity_log->created_at = \Carbon\Carbon::now();
                                $activity_log->save(); 
                                $user->photo = 'anon.png';
                                $user->save();
                            }
                        }
                        // Storage::disk('users')->delete($user->photo);
                    }
                    $user->roles()->detach($id);
                    $user->delete();
                    $activity_log = new ActivityLog();
                    $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                    $activity_log->entry = 'Deleted user: '.$user->first_name.' '.$user->middle_name.' '.$user->last_name.' with id:'.$user->id;
                    $activity_log->comment = '';
                    $activity_log->family = 'delete';
                    $activity_log->created_at = \Carbon\Carbon::now();
                    $activity_log->save();
                    DB::commit();
                    return redirect()->route('settings.users.index')->with('flash_message', 'User Deleted!!');
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
                return redirect()->back()
                    ->withErrors(['errors' => ['Warning: You must first deactivate this account to be able to delete it.']]);
            }
        }

    }
    public function editRole($id)
    {
        //
        $user = User::with('roles')->where('id', '=', $id)->firstOrFail();
        $roles = Role::whereNull('deleted_at')->get();
        return view('admin.users.edit_user_role', [
            'user'=>$user,
            'roles' => $roles,
        ]);
    }
    public function updateRole(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'role_name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('settings.users.edit.role',$id)
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $role = Role::where('id','=', $request->input('role_name'))->firstOrFail();
            $user = User::with('roles')->where('id', '=', $id)->firstOrFail();
            DB::beginTransaction();
            try
            {
                if($user->roles->isEmpty())
                {
                    $user->roles()->attach($request->input('role_name'));
                    $activity_log = new ActivityLog();
                    $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                    $activity_log->entry = 'Added '.$role->name.' role to'.$user->first_name.' '.$user->middle_name.' '.$user->last_name.' with id:'.$user->id;
                    $activity_log->comment = '';
                    $activity_log->family = 'insert';
                    $activity_log->created_at = \Carbon\Carbon::now();
                    $activity_log->save();
                }
                else
                {
                    $user->roles()->updateExistingPivot($user->roles()->first()->id, ['role_id' => $request->input('role_name')]);  
                    $activity_log = new ActivityLog();
                    $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                    $activity_log->entry = 'Updated user role of : '.$user->first_name.' '.$user->middle_name.' '.$user->last_name.' with id:'.$user->id.' to '.$role->name;
                    $activity_log->comment = '';
                    $activity_log->family = 'update';
                    $activity_log->created_at = \Carbon\Carbon::now();
                    $activity_log->save();    
                }
                if(!empty(Auth::user()->roles()->first()->id) && !empty($user->roles()->first()->id))
                {
                    if(Auth::user()->roles()->first()->id === $user->roles()->first()->id)
                    {
                        $privileges = Privilege::all();
                        foreach ($privileges as $privilege)
                        {
                            $privilegeText = ''.$privilege->name;
                            $p = User::find(Auth::user()->id)->checkPrivileges($privilegeText);
                            session([$privilegeText =>  $p]); 
                        }
                    }
                }
                DB::commit();
                return redirect()->route('settings.users.index')->with('flash_message', 'User Role Updated!!');
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
    public function editPassword($id){
        $user = User::where('id', '=', $id)->firstOrFail();
        return view('admin.users.edit_user_password', [
            'user'=> $user
        ]);
    }
    public function updatePassword(Request $request,$id)
    {
        $user = User::where('id','=',$id)->firstOrFail();

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
            return redirect()->route('settings.users.edit.password',$id)
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
                    $activity_log = new ActivityLog();
                    $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                    $activity_log->entry = 'Updated user password: '.$user->first_name.' '.$user->middle_name.' '.$user->last_name.' with id:'.$user->id;
                    $activity_log->comment = '';
                    $activity_log->family = 'update';
                    $activity_log->created_at = \Carbon\Carbon::now();
                    $activity_log->save();
                    DB::commit();
                    return redirect()->route('settings.users.index')->with('flash_message', 'User Password Updated!!');
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
                return redirect()->route('settings.users.edit.password',$id)
                            ->withErrors($validator)
                            ->withInput();
            }
        }
    }
    public function activate($id)
    {
        $user = User::where('id','=',$id)->firstOrFail();
        if($user->id === Auth::user()->id)
        {
            return redirect()->back()
                ->withErrors(['errors' => ['Warning: You cannot activate/deactivate your own account.']]);
        }
        else
        {

            DB::beginTransaction();
            try
            {
                $user->status = 1;
                $user->save();
                $activity_log = new ActivityLog();
                $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                $activity_log->entry = 'Activated user : '.$user->first_name.' '.$user->middle_name.' '.$user->last_name.' with id:'.$user->id;
                $activity_log->comment = '';
                $activity_log->family = 'update';
                $activity_log->created_at = \Carbon\Carbon::now();
                $activity_log->save();
                 DB::commit();
                return redirect()->route('settings.users.index')->with('flash_message', $user->first_name.' '.$user->middle_name.' '.$user->last_name.' is now active!!');
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
    public function deactivate($id)
    {
        $user = User::where('id','=',$id)->firstOrFail();
        if($user->id === Auth::user()->id)
        {
            return redirect()->back()
                ->withErrors(['errors' => ['Warning: You cannot activate/deactivate your own account.']]);
        }
        else
        {

            DB::beginTransaction();
            try
            {
                $user->status = 0;
                $user->save();
                $activity_log = new ActivityLog();
                $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                $activity_log->entry = 'Deactivated user : '.$user->first_name.' '.$user->middle_name.' '.$user->last_name.' with id:'.$user->id;
                $activity_log->comment = '';
                $activity_log->family = 'update';
                $activity_log->created_at = \Carbon\Carbon::now();
                $activity_log->save();
                DB::commit();
                return redirect()->route('settings.users.index')->with('flash_message', $user->first_name.' '.$user->middle_name.' '.$user->last_name.' is now inactive!!');
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
    public function profile()
    {

        $user = User::where('id',Auth::user()->id)->firstOrFail();
         if($user->hasRole('superuser')==1)
            {
                return view('admin.profile',
                [
                    'user' => $user
                ]
                );
            }
            else
            {
                 return view('profile',
                [
                    'user' => $user
                ]
                );
            }
            

       
    }
    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'middle_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'photo' => 'image|mimes:jpeg,jpg,png',
            'username' => 'required|min:4|unique:users,username,'.Auth::user()->id.',id,deleted_at,NULL',
            'email_address' => 'required|email|unique:users,email,'.Auth::user()->id.',id,deleted_at,NULL',
        ]);
        if ($validator->fails())
        {
            return redirect()->route('users.create')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $photo_temp = '';
            $user =  User::where('id',Auth::user()->id)->firstOrFail();
            DB::beginTransaction();
            try
            {
                $user->first_name = ucwords($request->first_name);
                $user->middle_name = ucwords($request->middle_name);
                $user->last_name = ucwords($request->last_name);
                $user->username = $request->username;
                $user->email = $request->email_address;
                $user->contact = $request->contact_no;
                $user->save();
                if($request->hasFile('photo'))
                {
                    if($request->photo->isValid())
                    {
                        if($user->photo != 'anon.png')
                        {
                            // Storage::disk('users')->delete($user->photo);
                            if(file_exists('uploads/users/'.$user->photo))
                            {
                                if(unlink('uploads/users/'.$user->photo))
                                {
                                    $activity_log = new ActivityLog();
                                    $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                                    $activity_log->entry = 'Deleted image '.$user->photo.' for user '.$user->id;
                                    $activity_log->comment = '';
                                    $activity_log->family = 'delete';
                                    $activity_log->created_at = \Carbon\Carbon::now();
                                    $activity_log->save();
                                }
                            }
                        }
                        $destinationPath = 'uploads/users';
                        $photoExtension = $request->photo->getClientOriginalExtension(); 
                        $filename = 'user_photo_'.$user->id.'_'.\Carbon\Carbon::now()->timestamp.'.'.$photoExtension;
                        $request->file('photo')->move($destinationPath, $filename);
                        // Storage::disk('users')->put($filename,file_get_contents($request->photo->getRealPath()));
                        if(file_exists('uploads/users/'.$filename))
                        {
                            $photo_temp = $filename;
                            $activity_log = new ActivityLog();
                            $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                            $activity_log->entry = 'Added image '.$filename.' for user '.$user->id;
                            $activity_log->comment = '';
                            $activity_log->family = 'insert';
                            $activity_log->created_at = \Carbon\Carbon::now();
                            $activity_log->save();
                            $user->photo = $photo_temp;
                            $user->save();
                        }
                        else
                        {
                            DB::rollback();
                            return redirect()->back()
                                ->withErrors(['errors' =>  ['There were problems uploading the image. Please try again. ']]);
                        }
                    }
                    else
                    {
                        DB::rollback();
                        return redirect()->back()
                            ->withErrors(['errors' =>  ['Uploaded file is not a valid file. Please try again. ']]);
                    }
                } 
                $activity_log = new ActivityLog();
                $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                $activity_log->entry = 'Updated user: '.$user->first_name.' '.$user->middle_name.' '.$user->last_name.' with id:'.$user->id;
                $activity_log->comment = '';
                $activity_log->family = 'update';
                $activity_log->created_at = \Carbon\Carbon::now();
                $activity_log->save();
                DB::commit();
                return redirect()->route('profile')->with('flash_message', 'Profile Updated!!');
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
    public function profilePassword()
    {
        $user = User::where('id',Auth::user()->id)->firstOrFail();
        return view('admin.profile_password',
                [
                    'user' => $user
                ]
            );
    }
    public function updateProfilePassword(Request $request)
    {
        $user = User::where('id','=',Auth::user()->id)->firstOrFail();

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
            return redirect()->back()
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
                    $activity_log = new ActivityLog();
                    $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                    $activity_log->entry = 'Updated user password: '.$user->first_name.' '.$user->middle_name.' '.$user->last_name.' with id:'.$user->id;
                    $activity_log->comment = '';
                    $activity_log->family = 'update';
                    $activity_log->created_at = \Carbon\Carbon::now();
                    $activity_log->save();
                    DB::commit();
                    return redirect()->route('profile')->with('flash_message', 'Account Password Updated!!');
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
                return redirect()->route('profile')
                            ->withErrors($validator)
                            ->withInput();
            }
        }
    }
    
}
