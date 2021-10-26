<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public $timestamps = false;
	protected $fillable = [
		'category_name',
		'active',
		'position',
		'photo',
	];

	// public function product($id)
	// {
	// 	$model = Category::where('product_id','=',$id)
	// 	->count();
	// 	if($model>0)
	// 	{
	// 		return true;
	// 	}
	// 	return false;
	// }
}
