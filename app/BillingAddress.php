<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{
    //
    public $timestamps = false;
	protected $fillable = [
		'user_id',
		'type',
		'first_name',
		'last_name',
		'address',
		'brgy',
		'region',
		'city',
		'email',
		'mobile',
		'contact',
		'landmark',
		'zip',
		'active',
	];
}
