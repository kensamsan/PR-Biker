<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public $timestamps = false;
    public $table = 'tags';
	protected $fillable = [
		'tag_name',
		'photo',
		'active',
	];

	public function productTag()
	{
		return $this->hasMany('App\ProductTag');
	}
}
