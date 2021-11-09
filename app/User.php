<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\PrivilegeRole;
use App\BillingAddress;
use App\RoleUser;
use App\Privilege;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 
        'password', 
        'email',
        'first_name',
        'middle_name',
        'last_name',
        'contact',
        'photo',
        'status',
        'active',
        'verification_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';

    public function getBillingAddress()
    {
        $id = $this->id;
        $b = BillingAddress::where('user_id','=',$id)->get();
        if(count($b)>0)
        {
            return $b->address;
        }
        else
        {
            return '';
        }
        
    }


    public function billingAddress()
    {
        return $this->hasMany('App\BillingAddress');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
   

    public function checkPrivileges($privileges)
    {
        $id = $this->id;
        $userRoles = RoleUser::where('user_id',$id)->first();
        $role_id = $userRoles== '' ? 0 : $userRoles->role_id;
        $privilege = Privilege::where('name',$privileges)->first();
        if(!empty($privilege))
        {
            $RolePrivileges = PrivilegeRole::where('role_id',$role_id)
                ->where('privilege_id',$privilege->id)
                ->get();
            return count($RolePrivileges)>0 ? 1 : 0;
        }
        return 0;
    }
    public function hasRole($role)
    {
        return $this->belongsToMany(Role::class)->where('name',$role)->exists();
    }
}
