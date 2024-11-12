<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\View\View;

class HomeController
{
	public function index() : View
	{
		// Challenge: Retrieve all Car records where the price is greater than $20,000.
		// $cars = Car::where('price', '>', '20000')->get();
		// dump($cars);
		
		// Challenge: Fetch the Maker details where the Maker name is 'Toyota'.
		// $maker = Maker::where('name', 'Toyota')->get();
		// dump($maker);
		
		// Challenge: Insert a new FuelType with the name 'Electric'.
		// $fuelType = ['name' => 'Electric Modern'];
		// FuelType::create($fuelType);
		
		// Challenge: Update the price of the Car with id 1 to $15,000.
		// $car = Car::find(1);
		// $car->price = '15000';
		// $car->save();
		
		// Challenge: Delete all Car records where the year is before 2020.
		// Car::where('year', '<', '2020')->delete();
		
		return view('home.index');
	}
}