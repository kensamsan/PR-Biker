<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //
    public $timestamps = false;
	protected $fillable = [
		'product_id',
		'file_name',
		'file_path',
		'file_original_name',
	];



	public function product()
	{
		return $this->belongsTo('App\Product');
	}

}
