<?php

namespace App\Http\Controllers;


use App\Models\{Maker};
use Illuminate\Contracts\View\View;

class HomeController
{
	public function index() : View
	{
		$makers = Maker::factory()
			->count(7)
			->sequence(['name' => 'Lexus'], ['name' => 'BMW'], ['name' => 'Mercedes'], ['name' => 'Tesla'], ['name' => 'Chevrolet'], ['name' => 'Honda'], ['name' => 'Volkswagen'])
			->create();
		dump($makers);
		
		// $users = User::factory()->count(9)->create();
		// dump($users );
		
		return view('home.index');
	}
}