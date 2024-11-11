<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('cars.car.index');
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
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
	public function show(string $id)
	{
		return view('cars.car.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		return view('cars.car.edit');
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}

	public function search(Request $request)
	{
		return view('cars.car.search');
	}
}