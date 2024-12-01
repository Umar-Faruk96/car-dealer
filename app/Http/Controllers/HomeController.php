<?php

namespace App\Http\Controllers;


use App\Models\Car;
use Illuminate\Contracts\View\View;

class HomeController
{
	public function index() : View
	{
		$cars = Car::with(['primaryImage', 'maker', 'model', 'carType', 'fuelType', 'city'])
			->where('published_at', '<', now())
			->limit(30)
			->get()
			->sortByDesc('published_at');
		
		return view('home.index', [
			'cars' => $cars]);
	}
}