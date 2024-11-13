<?php

namespace App\Http\Controllers;


use App\Models\{Car, User};
use Illuminate\Contracts\View\View;

class HomeController
{
	public function index() : View
	{
		$car = Car::find(3);
		dump($car->favouredUsers);
		
		$user = User::find(1);
		dump($user->favoriteCars);
		// $user->favoriteCars()->attach($car);
		// $user->favoriteCars()->sync([1, 2]);
		// $user->favoriteCars()->detach($car);
		
		return view('home.index');
	}
}