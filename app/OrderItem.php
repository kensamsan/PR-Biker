<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Log;
class OrderItem extends Model
{
	//
	protected $fillable = [
		'order_id',
		'variation_id',
		'transaction_id',
		'status',
		'qty',
		'price',
	];

  public function product()
    {
        return $this->hasManyThrough('App\Product', 'App\Variation');
    }

	public function variation()
	{
		return $this->belongsTo('App\Variation');
	}
	
	public function discount()
	{
		return $this->hasMany('App\OrderItemDiscount');
	}

	public function orderProduct()
	{
		// Log::info($this->product());
		return $this->belongsTo('App\Variation');
		// return $this->hasManyThrough('App\Product', 'App\Variation','variation_id','id');
	}

	// public function orderproduc()
	// {
	// 	Log::info('asd');
	// 	// dd($this->belongsTo('App\Variation')->id);
	// 	// $model = Product::find($this->belongsTo('App\Variation'))->product_id;
 //  //       return $model->product_name;

 //        return $this->belongsTo('App\Variation');

		
	// }
	

}
