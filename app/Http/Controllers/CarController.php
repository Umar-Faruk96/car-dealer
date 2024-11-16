<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CarController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index() : View
	{
		return view('cars.car.index');
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
		$publishedCars = Car::where('published_at', '<', now());
		$carCount = $publishedCars->count();
		$cars = $publishedCars->limit(15)->get()->sortByDesc('published_at');
		
		return view('cars.car.search', compact('cars', 'carCount'));
	}
}