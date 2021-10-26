<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Role extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   

    protected $table = 'roles';

    public function privileges()
    {
    	return $this->belongsToMany(Privilege::class);
    }
    public function users()
    {
    	return $this->belongsToMany(User::class);
    }
}
