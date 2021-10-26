<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPromo extends Model
{
    //
    protected $fillable = [
		'order_id',
		'promo_code_id',
		'variation_id',
		'calculated_value',
	];

	public function promo()
	{
		return $this->belongsTo('App\PromoCode','promo_code_id');
	}
	
	public function promoCode()
	{
		return $this->belongsTo('App\PromoCode');
	}

}
