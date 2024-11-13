<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Factories\HasFactory, Model, Relations\BelongsTo, Relations\HasMany};

class City extends Model
{
	use HasFactory;
	
	public $timestamps = false;
	protected $fillable = ['state_id', 'name'];
	
	public function state() : BelongsTo
	{
		return $this->belongsTo(State::class);
	}
	
	public function cars() : HasMany
	{
		return $this->hasMany(Car::class);
	}
}