<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maker>
 */
class MakerFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition() : array
	{
		return [
			'name' => fake()->randomElement(['Ford', 'Honda', 'Toyota', 'Nissan', 'Chevrolet', 'Volkswagen', 'Hyundai', 'Kia', 'Mazda', 'Subaru']),
		];
	}
}