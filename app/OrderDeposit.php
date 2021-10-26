<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDeposit extends Model
{
    //
    public $timestamps = false;
	protected $fillable = [
		'order_id',
		'file_name',
		'photo_title',
		'admin',
	];
}