<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
		'order_id',
		'user_id',
		'billing_address_id',
		'status',
		'payment_method',
		'payment_status',
		'transaction_code',
		'total',
		'notes',
		'shipping_id',
	];

	public function address()
	{
		return $this->belongsTo('App\BillingAddress','billing_address_id');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
	public function orderPromo()
	{
		return $this->hasMany('App\OrderPromo');
	}

	public function shipping()
	{
		return $this->belongsTo('App\PromoCode','shipping_id');
	}

	public function orderItem()
	{
		return $this->hasMany('App\OrderItem');	
	}
	// public function promoCode()
	// {
	// 	return $this->hasManyThrough('App\PromoCode','App\OrderPromo','promo_code_id','order_id');
	// }
}
