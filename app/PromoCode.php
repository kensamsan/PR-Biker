<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    //
    public $timestamps = false;
	protected $fillable = [
		'code',
		'label',
		'description',
		'type',
		'target',
		'value',
		'order',
		'attributes',
		'date_from',
		'date_to',
		'discount_type',
		'discount_amount',
		'over',
		'banner',
	];
}
