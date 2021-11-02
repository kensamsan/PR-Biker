<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentalLogs extends Model
{
    //
    protected $table = 'rental_logs';
     protected $fillable = [
		'rental_id',
		'title',
		'content',
	];

	public function order()
	{
		return $this->belongsTo('App\Rentals');
	}
}
