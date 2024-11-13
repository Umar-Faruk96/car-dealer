<?php

namespace App\Http\Controllers;


use App\Models\{Maker};
use Illuminate\Contracts\View\View;

class HomeController
{
	public function index() : View
	{
		Maker::factory()->count(2)
			->hasModels(2)->create();
		
		return view('home.index');
	}
}