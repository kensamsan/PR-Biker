<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Log;
use Auth;
class Product extends Model
{
	//
	public $timestamps = false;
	protected $fillable = [
		'category_id',
		'product_code',
		'product_name',
		'description',
		'details',
		'visibility',
		'price',
		'brgy',
		'year',
	];
	public function productQtyAvailable()
	{
		$id = $this->id;
		$po = Transaction::where('type','=','po')
			->where('product_id','=',$id)
			->sum('qty');
		$so = Transaction::where('type','=','so')
			->where('product_id','=',$id)
			->sum('qty');
		$res = Transaction::where('type','=','res')
			->where('product_id','=',$id)
			->sum('qty');
	
		$qty = $po-$so-$res;
		return $qty;
	}
	public function productTag()
	{
		return $this->hasMany('App\ProductTag');
	}
	public function getProductImage()
	{	
		$id = $this->id;
		$var = $this->productImage()->first();
		return ($var)?$this->productImage()->first()->file_name:'no_pic.png';
		

	}
	public function productTagPopular()
    {
        $id = $this->id;
        $tag_id = Tag::where('tag_name','Popular')->first();
    	
        $RolePrivileges = ProductTag::where('tag_id',$tag_id->id)
            ->where('product_id',$id)
            ->get();
        return count($RolePrivileges)>0 ? 1 : 0;
        
    }
	// public function tags() {
	// 	return $this->hasManyThrough('App\Tag','App\ProductTag','product_id','id','tag_id');
	// }
	// public function category() {
	// 	return $this->hasManyThrough('App\Category','App\ProductCategory','product_id','id');
	// }

	// public function category() {
	// 	return $this->hasManyThrough('App\Category','App\ProductCategory','product_id','id');
	// }

	// public function productCategory() {
	// 	return $this->hasMany('App\ProductCategory');
	// }

	public function Category() {
		return $this->belongsTo('App\Category');
	}
	public function Variation() {
		return $this->hasMany('App\Variation');
	}

	public function productImage() {
		return $this->hasMany('App\ProductImage','product_id');
	}

	public function getProductImageCount()
	{
		$x = ProductImage::where('product_id','=',$this->id)
			->count();
	
		return $x;
	}


	public function transaction()
	{
		return $this->hasMany('App\Transaction');
	}

	public function firstNonZeroSalePrice()
	{
		$x = Variation::where('product_id','=',$this->id)
			->where('sale_price','>',0)
			->first();
		return isset($x->sale_price) ? $x->sale_price : 0;
	}
	public function firstNonZeroPrice()
	{
		$x = Variation::where('product_id','=',$this->id)
			->where('price','>',0)
			->first();
		return isset($x->price) ? $x->price : 0;
	}
	public function wishlist()
	{
		$wishlist = Wishlist::where('user_id', '=', Auth::user()->id)
			->where('product_id', '=', $this->id)
			->count();
		if($wishlist>0)
		{
			return true;
		}
		return false;
	}
	public  function isSale()
	{
		$model = PromoSale::where('product_id','=',$this->id)
		->where(function($query) {
			$query->where(function($q1){
				$q1->whereDate('date_from','<=',Carbon::now()->toDateString())
			->whereNull('date_to');
			})
			->orWhere(function($q2){
				$q2->whereDate('date_from','<=',Carbon::now()->toDateString())
				->whereDate('date_to','>=',Carbon::now()->toDateString())
				->whereNotNull('date_to');
			});

		})->count();
		if($model>0)
		{
			return true;
		}
		return false;
	}

	public  function isSaleDate($date)
	{
		$model = PromoSale::where('product_id','=',$this->id)
		->where(function($query) use ($date) {
			$query->where(function($q1)use ($date){
				$q1->whereDate('date_from','<=',Carbon::parse($date)->toDateString())
			->whereNull('date_to');
			})
			->orWhere(function($q2)use ($date){
				$q2->whereDate('date_from','<=',Carbon::parse($date)->toDateString())
				->whereDate('date_to','>=',Carbon::parse($date)->toDateString())
				->whereNotNull('date_to');
			});

		})->count();
		if($model>0)
		{
			return true;
		}
		return false;
	}

}
