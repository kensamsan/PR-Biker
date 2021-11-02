<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rentals extends Model
{
    //
    protected $table = 'rentals';
    protected $fillable = [
		'user_id',
		'bike_name',
		'bike_unit',
		'price',
		'city_id',
		'description',
		'renter_id',
		'dt_from',
		'dt_to',
		'billing_address_id',
		'shipping_type',
		'status',
		'payment_method',
		'payment_status',
	];
	public function rentalDeposit()
	{
		return $this->hasMany('App\RentalDeposits','rental_id');
	}
	public function city()
	{
		return $this->belongsTo('App\City','city_id');
	}
	public function customer()
	{
		return $this->belongsTo('App\User');
	}

	public function rentalImage() {
		return $this->hasMany('App\RentalImages','rental_id');
	}

	public function getDepositImage()
	{	
		$id = $this->id;
		$var = $this->rentalDeposit()->orderBy('id','desc')->first();
		return ($var)?$this->rentalDeposit()->first()->file_name:'no_pic.png';
		

	}


	public function getProductImage()
	{	
		$id = $this->id;
		$var = $this->rentalImage()->first();
		return ($var)?$this->rentalImage()->first()->file_name:'no_pic.png';
		

	}

}
