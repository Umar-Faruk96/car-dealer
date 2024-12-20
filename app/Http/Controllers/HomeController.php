<?php

namespace App\Http\Controllers;


use App\Models\{Car, CarType, City, FuelType, Maker, Model, State};
use Illuminate\Contracts\View\View;

class HomeController
{
	public function index() : View
	{
		$cars = Car::with(['primaryImage', 'maker', 'model', 'carType', 'fuelType', 'city'])
			->where('published_at', '<', now())
			->paginate(15);
		$makers = Maker::all()->sortBy('name');
		$models = Model::all()->sortBy('name');
		$states = State::all()->sortBy('name');
		$cities = City::all()->sortBy('name');
		$carTypes = CarType::all()->sortBy('name');
		$fuelTypes = FuelType::all()->sortBy('name');
		
		return view('home.index', [
			'cars' => $cars, 'makers' => $makers, 'models' => $models, 'states' => $states, 'cities' => $cities, 'carTypes' => $carTypes, 'fuelTypes' => $fuelTypes]);
	}
}