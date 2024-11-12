<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Factories\HasFactory, Model, SoftDeletes};

class Car extends Model
{
	use HasFactory, SoftDeletes;
}