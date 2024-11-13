<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Factories\HasFactory, Model};

class FuelType extends Model
{
	use HasFactory;
	
	public $timestamps = false;
	protected $fillable = ['name'];
}