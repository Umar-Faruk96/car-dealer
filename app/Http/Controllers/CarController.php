<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
	
	public function search() : View
	{
		$publishedCars = Car::with(['primaryImage', 'maker', 'model', 'carType', 'fuelType', 'city'])
			->where('published_at', '<', now());
		$cars = $publishedCars->paginate(9);
		
		return view('cars.car.search', compact('cars'));
	}
	
	public function watchlist() : View
	{
		// $favouriteCars = User::inRandomOrder()->first()->favouriteCars()->get()->take(15);
		$favouriteCars = User::find(4)->favouriteCars()->with(['primaryImage', 'maker', 'model', 'carType', 'fuelType', 'city'])
			->paginate(10);
		
		return view('cars.car.watchlist', compact('favouriteCars'));
	}
}