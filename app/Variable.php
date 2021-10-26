<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    //
    protected $fillable = [
		'name', 'value','description',
	];

	protected $table = 'var';
}
