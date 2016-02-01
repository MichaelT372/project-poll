<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
	protected $fillable = [
		'title',
		'slug'
	];

	public function options()
	{
		return $this->hasMany('App\Option');
	}
}
