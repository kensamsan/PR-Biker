<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'email','token',
    ];
    protected $hidden = [
        'token'
    ];

    protected $table = 'password_resets';
}
