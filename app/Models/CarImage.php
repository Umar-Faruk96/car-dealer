<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Factories\HasFactory, Model, Relations\BelongsTo};

class CarImage extends Model
{
	use HasFactory;
	
	public $timestamps = false;
	protected $fillable = ['car_id', 'image_path', 'position'];
	
	public function car() : BelongsTo
	{
		return $this->belongsTo(Car::class);
	}
}