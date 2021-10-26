<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Role;
use App\Privilege;
use App\ActivityLog;
use App\User;
use DB;
use Hash;
use Validator;
use Auth;
use Log;
use Session;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $roles = Role::whereNull('deleted_at')
            ->where(function ($query) use ($request)
                    {
                        $query->where('name','like', '%'.$request->search.'%');
                    }
                )
            ->get();  
        return view('admin.roles.index',
            [
                'roles' => $roles,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.roles.create_roles');
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
            'name' => 'required|max:255|unique:roles,name,NULL,id,deleted_at,NULL',
        ]);
        if ($validator->fails())
        {
            return redirect()
                ->route('roles.create')
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            DB::beginTransaction();
            try
            {
                $role = new Role();
                $role->name = $request->name;
                $role->save();
                $activity_log = new ActivityLog();
                $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                $activity_log->entry = 'Added role: '.$role->name.' with id:'.$role->id;
                $activity_log->comment = '';
                $activity_log->family = 'insert';
                $activity_log->created_at = \Carbon\Carbon::now();
                $activity_log->save();
                DB::commit();
                return redirect()->route('roles.index')->with('flash_message', 'Role Created!!');
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
        $role = Role::whereNull('deleted_at')->where('id',$id)->firstOrFail();
        return view('admin.roles.edit_roles',
                [
                    'role' => $role
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
            'name' => 'required|max:255|unique:roles,name,'.$id.',id,deleted_at,NULL',
        ]);
        if ($validator->fails())
        {
            return redirect()
                ->route('roles.edit',$id)
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            $role = Role::whereNull('deleted_at')->where('id',$id)->firstOrFail();
            DB::beginTransaction();
            try
            {
                $role->name = $request->name;
                $role->save();
                $activity_log = new ActivityLog();
                $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                $activity_log->entry = 'Updated role: '.$role->name.' with id:'.$role->id;
                $activity_log->comment = '';
                $activity_log->family = 'update';
                $activity_log->created_at = \Carbon\Carbon::now();
                $activity_log->save();
                DB::commit();
                return redirect()->route('roles.index')->with('flash_message', 'Role Updated!!');
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
        $role = Role::whereNull('deleted_at')->where('id',$id)->firstOrFail();
        if(Auth::user()->roles->first()->id !== $id)
        {
            DB::beginTransaction();
            try
            {
                
                $role->privileges()->detach();
                $activity_log = new ActivityLog();
                $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                $activity_log->entry = 'Deleted role: '.$role->name.' with id:'.$role->id;
                $activity_log->comment = '';
                $activity_log->family = 'delete';
                $activity_log->created_at = \Carbon\Carbon::now();
                $activity_log->save();
                $role->delete();
                DB::commit();
                return redirect()->route('roles.index')->with('flash_message', 'Role Deleted!!');
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
                     ->withErrors(['errors' =>['You cannot delete your current role.']]);
        }
    }
    public function editPrivilege($id)
    {
        $role = Role::whereNull('deleted_at')->where('id','=',$id)->first();
        $has_privileges = $role->privileges()->get(['id','name']);
        $has_not_privileges = Privilege::whereNull('deleted_at')->whereNotIn('id',$role->privileges()->pluck('id'))->get(['id','name']);
        return view('admin.roles.edit_role_privilege',[
           'role'=>$role,
           'has_privileges' => $has_privileges,
           'has_not_privileges' => $has_not_privileges,
            ]);
    }
    public function updatePrivilege(Request $request, $id, $type)
    {
        if($type=='destroy')
        {
            $validator = Validator::make($request->all(), [
                'has_privilege' => 'required',
            ]);
            if($validator->fails())
            {
                return redirect()->route('roles.edit.privilege',$id)
                            ->withErrors($validator)
                            ->withInput();
            }
            else
            {

                $role = Role::with('privileges')->whereNull('deleted_at')->where('id','=', $id)->firstOrFail();

                $has_privileges = $request->input('has_privilege');
                if($role->privileges()->whereIn('id',$has_privileges)->exists())
                {
                    DB::beginTransaction();
                    try
                    {   
                        $role->privileges()->detach($has_privileges);
                        $activity_log = new ActivityLog();
                        $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                        $activity_log->entry = 'Deleted Privileges of Role '.$role->name;
                        $activity_log->comment = '';
                        $activity_log->family = 'delete';
                        $activity_log->created_at = \Carbon\Carbon::now();
                        $activity_log->save();
                        if(!empty(Auth::user()->roles()->first()->id))
                        {
                            $user_role = Auth::user()->roles()->where('id','=',$id)->count();
                            if($user_role > 0)
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
                        return redirect()->route('roles.edit.privilege',$id)->with('flash_message', 'Privilege Role Deleted!!');
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
                             ->withErrors(['errors' =>['Privileges does not exist.']]);
                }
                
            }
        }
        else if($type=='store')
        {
            $validator = Validator::make($request->all(), [
                'has_not_privilege' => 'required',
            ]);
            if ($validator->fails()){
                return redirect()->route('role.edit.privilege',$id)
                            ->withErrors($validator)
                            ->withInput();
            }
            else
            {
                $role = Role::with('privileges')->whereNull('deleted_at')->where('id','=', $id)->firstOrFail(); 
                $has_not_privileges = $request->input('has_not_privilege');
                if($role->privileges()->whereIn('id',$has_not_privileges)->exists())
                {
                    return redirect()->back()
                             ->withErrors(['errors' =>['Privileges already exist.']]);
                }
                else
                {
                    DB::beginTransaction();
                    try
                    { 
                        $role->privileges()->attach($has_not_privileges);
                        $activity_log = new ActivityLog();
                        $activity_log->username = Auth::user()->username.'@'.\Request::ip();
                        $activity_log->entry = 'Added Privileges of Role '.$role->name;
                        $activity_log->comment = '';
                        $activity_log->family = 'insert';
                        $activity_log->created_at = \Carbon\Carbon::now();
                        $activity_log->save();
                        if(!empty(Auth::user()->roles()->first()->id))
                        {
                            $user_role = Auth::user()->roles()->where('id','=',$id)->count();
                            if($user_role > 0)
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
                        return redirect()->route('roles.edit.privilege',$id)->with('flash_message', 'Privilege Role Added!!');
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
        }
        else
        {
            abort(404);
        }
    }
}
