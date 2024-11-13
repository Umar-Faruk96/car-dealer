<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, Relations\BelongsTo};

class CarImage extends Model
{
	public $timestamps = false;
	protected $fillable = ['car_id', 'image_path', 'position'];
	
	public function car() : BelongsTo
	{
		return $this->belongsTo(Car::class);
	}
}