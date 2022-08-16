<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Assignment;
use App\Models\Committee;
use App\Models\Gender;
use App\Models\Letter;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignmentSeeder extends Seeder
{
	private Generator $faker;

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$committees = Committee::all();
		$areas = Area::all();
		$genders = Gender::all();
		$letters = Letter::all();
		$this->faker = Factory::create('en');

		$assignments = collect(array_fill(0, 10, []))->map(fn($item) => [
			'committee_id' => $committees->random(1)->first()->id,
			'area_id' => $areas->random(1)->first()->id,
			'gender_id' => $genders->random(1)->first()->id,
			'from' => $this->faker->randomNumber(2),
			'to' => $this->faker->randomNumber(3),
		])->all();
		Assignment::insert($assignments);
		Assignment::all()->each(fn($assignment) => $assignment->letters()->sync($letters->random(3)));

	}
}
