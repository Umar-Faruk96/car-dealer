<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, Relations\HasMany};

class State extends Model
{
	public $timestamps = false;
	
	
	public function cities() : HasMany
	{
		return $this->hasMany(City::class);
	}
	
	public function cars() : HasMany
	{
		return $this->hasMany(Car::class);
	}
}