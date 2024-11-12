<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CarFactory extends Factory
{
	protected $model = Car::class;

	public function definition(): array
	{
		return [
			'maker_id' => $this->faker->randomNumber(),
			'model_id' => $this->faker->randomNumber(),
			'year' => $this->faker->randomNumber(),
			'price' => $this->faker->randomNumber(),
			'vin' => $this->faker->word(),
			'mileage' => $this->faker->randomNumber(),
			'car_type_id' => $this->faker->randomNumber(),
			'fuel_type_id' => $this->faker->randomNumber(),
			'user_id' => $this->faker->randomNumber(),
			'city_id' => $this->faker->randomNumber(),
			'address' => $this->faker->address(),
			'phone' => $this->faker->phoneNumber(),
			'description' => $this->faker->text(),
			'published_at' => Carbon::now(),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		];
	}
}