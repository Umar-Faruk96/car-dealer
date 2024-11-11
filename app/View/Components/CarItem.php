<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CarItem extends Component
{
	public function render(): View
	{
		return view('cars.car-item');
	}
}