<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, Relations\HasMany};

class CarType extends Model
{
	public $timestamps = false;
	protected $fillable = ['name'];
	
	public function cars() : HasMany
	{
		return $this->hasMany(Car::class);
	}
}