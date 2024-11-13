<?php

namespace App\Http\Controllers;


use App\Models\Car;
use App\Models\User;
use Illuminate\Contracts\View\View;

class HomeController
{
	public function index() : View
	{
		// Maker::factory()->count(10)->hasModels(2)->create();
		
		User::factory()->has(Car::factory()->count(3), 'favoriteCars')->create();
		
		return view('home.index');
	}
}