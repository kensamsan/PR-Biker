<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentalImages extends Model
{
    //
    public $timestamps = false;
	protected $fillable = [
		'rental_id',
		'file_name',
		'file_path',
		'file_original_name',
	];



	public function rentals()
	{
		return $this->belongsTo('App\Rentals');
	}
}
