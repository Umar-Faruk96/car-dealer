<?php

namespace Database\Seeders;

use App\Models\{Car, CarImage, CarType, City, FuelType, Maker, Model, State, User};
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run() : void
	{
		CarType::factory()->sequence(
			['name' => 'Sedan'],
			['name' => 'Hatchback'],
			['name' => 'SUV'],
			['name' => 'Pickup Truck'],
			['name' => 'Minivan'],
			['name' => 'Jeep'],
			['name' => 'Coupe'],
			['name' => 'Crossover'],
			['name' => 'Van'],
			['name' => 'Sports Car'],
		)->count(10)->create();
		
		FuelType::factory()->sequence(
			['name' => 'Diesel'],
			['name' => 'Gasoline'],
			['name' => 'Electric'],
			['name' => 'Hybrid'],
			['name' => 'Petrol'],
			['name' => 'Octane'],
			['name' => 'Gas'],
			['name' => 'LPG'],
			['name' => 'CNG'],
			['name' => 'Battery']
		)->count(10)->create();
		
		$states = [
			'California' => ['Los Angeles', 'San Francisco', 'San Diego', 'San Jose', 'Fresno'],
			'Texas' => ['Dallas', 'Austin', 'San Antonio', 'Houston', 'Fort Worth'],
			'Florida' => ['Miami', 'Tampa', 'Orlando', 'Jacksonville', 'St. Petersburg'],
			'New York' => ['New York City', 'Buffalo', 'Rochester', 'Yonkers', 'Albany'],
			'Illinois' => ['Chicago', 'Aurora', 'Rockford', 'Joliet', 'Naperville'],
			'Pennsylvania' => ['Philadelphia', 'Pittsburgh', 'Allentown', 'Erie', 'Reading'],
			'Ohio' => ['Columbus', 'Cleveland', 'Cincinnati', 'Toledo', 'Akron'],
			'Georgia' => ['Atlanta', 'Augusta', 'Savannah', 'Columbus', 'Athens'],
			'North Carolina' => ['Charlotte', 'Raleigh', 'Greensboro', 'Winston-Salem', 'Durham'],
			'Michigan' => ['Detroit', 'Grand Rapids', 'Warren', 'Ann Arbor', 'Lansing']
		];
		
		foreach($states as $state => $cities) {
			State::factory()
				->state([
					'name' => $state
				])
				->has(City::factory()->count(count($cities))->sequence(...array_map(fn($city) => [
						'name' => $city
					], $cities)
				))
				->create();
		}
		
		$makers = [
			'Toyota' => ['Camry', 'Corolla', 'Prius', 'Rav4', 'Land Cruiser'],
			'Ford' => ['Mustang', 'F-150', 'Focus', 'Escape', 'Explorer'],
			'Honda' => ['Civic', 'Accord', 'CR-V', 'Pilot', 'Odyssey'],
			'Chevrolet' => ['Camaro', 'Corvette', 'Malibu', 'Silverado', 'Cruze'],
			'Nissan' => ['Sentra', 'Altima', 'Maxima', 'Pathfinder', 'Leaf'],
			'Volkswagen' => ['Golf', 'Jetta', 'Passat', 'Tiguan', 'Touareg'],
			'Hyundai' => ['Elantra', 'Sonata', 'Tucson', 'Santa Fe', 'Kona'],
			'Kia' => ['Optima', 'Sorento', 'Sportage', 'Niro', 'Niro EV'],
			'BMW' => ['3 Series', '5 Series', '7 Series', 'X5', 'X6'],
			'Lexus' => ['IS300', 'ES350', 'GS400', 'LS500', 'RX450'],
		];
		foreach($makers as $maker => $models) {
			Maker::factory()
				->state([
					'name' => $maker
				])
				->has(Model::factory()->count(count($models))->sequence(...array_map(fn($city) => [
						'name' => $city
					], $models)
				))
				->create();
		}
		
		User::factory()->count(3)->create();
		
		User::factory()
			->sequence(
				[
					'name' => 'Omor Faruk Sheikh Raihan',
					'email' => 'omor@faruk.co',
				],
				[
					'name' => 'Aryan Arman Amdad',
					'email' => 'aryan@arman.he',
				]
			)
			->count(2)
			->has(Car::factory()
				->count(50)
				->has(CarImage::factory()
					->count(5)
					->sequence(fn(Sequence $sequence) => ['position' => ($sequence->index % 5 + 1)]), 'images')
				->hasFeatures(), 'favoriteCars')
			->create();
	}
}