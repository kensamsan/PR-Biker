<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    //
     protected $fillable = [
        'username',
        'user_id',
        'entry',
        'comment',
        'family'
    ];

    protected $table = 'activity_logs';
}
