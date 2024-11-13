<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Factories\HasFactory, Model, Relations\HasMany};

class Maker extends Model
{
	use HasFactory;
	
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