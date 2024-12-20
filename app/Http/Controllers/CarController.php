<?php

namespace App\Http\Controllers;

use App\Models\{User, Car, CarType, City, FuelType, Maker, Model, State};
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class CarController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index() : View
	{
		$carsOfUser = User::inRandomOrder()->first()->cars()->with(['primaryImage', 'maker', 'model'])->paginate(10);
		
		return view('cars.car.index', compact('carsOfUser'));
	}
	
	/**
	 * Show the form for creating a new resource.
	 */
	public function create() : View
	{
		return view('cars.car.create');
	}
	
	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
	}
	
	/**
	 * Display the specified resource.
	 */
	public function show(Car $car) : View
	{
		return view('cars.car.show', compact('car'));
	}
	
	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Car $car) : View
	{
		return view('cars.car.edit', compact('car'));
	}
	
	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Car $car)
	{
		//
	}
	
	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Car $car)
	{
		//
	}
	
	public function search(Request $request) : View
	{
		$searchedCars = Car::with(['primaryImage', 'maker', 'model', 'carType', 'fuelType', 'city'])
			->where([
				['maker_id', $request->maker_id],
				['model_id', $request->model_id],
				['car_type_id', $request->car_type_id],
				['fuel_type_id', $request->fuel_type_id],
				['city_id', $request->city_id]
			])
			->whereHas('city', function(Builder $query) use ($request) {
				$query->where('state_id', $request->state_id);
			})
			->whereBetween('year', [$request->year_from, $request->year_to])
			->whereBetween('price', [$request->price_from, $request->price_to]);
		
		$cars = $searchedCars->paginate(9);
		$makers = Maker::all()->sortBy('name');
		$models = Model::with('maker')->get()->sortBy('name');
		$states = State::all()->sortBy('name');
		$cities = City::with('state')->get()->sortBy('name');
		$carTypes = CarType::all()->sortBy('name');
		$fuelTypes = FuelType::all()->sortBy('name');
		$yearForm = $request->year_from;
		$yearTo = $request->year_to;
		$priceForm = $request->price_from;
		$priceTo = $request->price_to;
		
		return view('cars.car.search', compact('cars', 'makers', 'models', 'states', 'cities', 'carTypes', 'fuelTypes', 'yearForm', 'yearTo', 'priceForm', 'priceTo'));
	}
	
	public function watchlist() : View
	{
		// $favouriteCars = User::inRandomOrder()->first()->favouriteCars()->get()->take(15);
		$favouriteCars = User::find(4)->favouriteCars()->with(['primaryImage', 'maker', 'model', 'carType', 'fuelType', 'city'])
			->paginate(10);
		
		return view('cars.car.watchlist', compact('favouriteCars'));
	}
}