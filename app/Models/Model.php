<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Factories\HasFactory, Model as EloquentModel, Relations\BelongsTo, Relations\HasMany};

class Model extends EloquentModel
{
	use HasFactory;
	
	public $timestamps = false;
	protected $fillable = ['maker_id', 'name'];
	
	public function maker() : BelongsTo
	{
		return $this->belongsTo(Maker::class);
	}
	
	public function cars() : HasMany
	{
		return $this->hasMany(Car::class);
	}
}