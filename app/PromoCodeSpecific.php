<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromoCodeSpecific extends Model
{
    //
    public $timestamps = false;
	protected $fillable = [
		'promo_code_id',
		'category_id',
		'product_id',
	];
}
