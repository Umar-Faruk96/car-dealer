<?php

namespace App\Http\Controllers;


use App\Models\Car;
use Illuminate\Contracts\View\View;

class HomeController
{
	public function index() : View
	{
		$cars = Car::where('published_at', '<', now())->orderBy('published_at', 'desc')->limit(30)->get();
		
		return view('home.index', [
			'cars' => $cars]);
	}
}