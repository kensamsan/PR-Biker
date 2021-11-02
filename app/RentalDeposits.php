<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentalDeposits extends Model
{
    //
    public $timestamps = false;
	protected $fillable = [
		'rental_id',
		'file_name',
		'photo_title',
		'admin',
	];
}
