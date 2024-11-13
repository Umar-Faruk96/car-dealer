<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, Relations\HasMany};

class Maker extends Model
{
	public $timestamps = false;
	protected $fillable = ['name'];
	
	public function models() : HasMany
	{
		return $this->hasMany(Model::class);
	}
	
	public function cars() : HasMany
	{
		return $this->hasMany(Car::class);
	}
}