<?php

namespace Database\Factories;

use App\Models\{Car, CarType, City, FuelType, Maker, Model, User};
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CarFactory extends Factory
{
	protected $model = Car::class;
	
	public function definition() : array
	{
		return [
			'maker_id' => Maker::inRandomOrder()->first()->id,
			'model_id' => function(array $attributes) {
				return Model::where('maker_id', $attributes['maker_id'])->inRandomOrder()->first()->id;
			},
			// 'model_id' => fn(array $attributes) => Model::where('maker_id', $attributes['maker_id'])->inRandomOrder()->first()->id,
			'year' => $this->faker->year(),
			'price' => (int) $this->faker->randomFloat(2, 10000, 100000),
			'vin' => strtoupper(Str::random(17)),
			'mileage' => $this->faker->randomFloat(2, 5000, 50000),
			'car_type_id' => CarType::inRandomOrder()->first()->id,
			'fuel_type_id' => FuelType::inRandomOrder()->first()->id,
			'user_id' => User::inrandomOrder()->first()->id,
			'city_id' => City::inrandomOrder()->first()->id,
			'address' => $this->faker->address(),
			'phone' => fn(array $attributes) => User::find($attributes['user_id'])->phone,
			'description' => $this->faker->text(500),
			'published_at' => $this->faker->optional(0.9)->dateTimeBetween(Carbon::now()->subDays(30), Carbon::now()->addDays()),
		];
	}
}