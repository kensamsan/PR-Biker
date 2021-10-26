<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItemDiscount extends Model
{
    //
    protected $fillable = [
		'description',
		'order_item_id',
		'promo_code_id',
	];

	public function promoCode()
	{
		return $this->belongsTo('App\PromoCode');
	}
}
