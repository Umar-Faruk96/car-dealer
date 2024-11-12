<?php

namespace App\Http\Controllers;


use App\Models\Car;
use Illuminate\Contracts\View\View;

class HomeController
{
	public function index() : View
	{
		$car = Car::find(1);
		
		$car->images()->create(['image_path' => 'home', 'position' => 2]);
		
		return view('home.index');
	}
}