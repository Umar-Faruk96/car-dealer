<?php

namespace App\Http\Controllers;


use App\Models\{Maker, Model};
use Illuminate\Contracts\View\View;

class HomeController
{
	public function index() : View
	{
		// Model::factory()->count(2)
		// 	->forMaker()->create();
		
		$maker = Maker::factory()->create();
		Model::factory()->count(2)
			// ->for(Maker::factory()->state(['name' => 'Honda']))->create();
			->for($maker)->create();
		
		return view('home.index');
	}
}