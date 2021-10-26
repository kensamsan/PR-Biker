<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
		'product_id',
		'qty',
		'user_id',
		'order_id',
		'type',
	];

	

}
