<?php

namespace App\Http\Controllers;


use App\Models\{User};
use Illuminate\Contracts\View\View;

class HomeController
{
	public function index() : View
	{
		// $maker = Maker::factory()->create(['name' => 'Audi']);
		// dump($maker);
		
		$users = User::factory()->count(9)->create();
		dump($users);
		
		return view('home.index');
	}
}