<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLog extends Model
{
	//
	 protected $fillable = [
		'order_id',
		'title',
		'content',
	];

	public function order()
	{
		return $this->belongsTo('App\Order');
	}
}
