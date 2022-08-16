<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Committee;
use App\Models\Gender;
use App\Models\Letter;
use App\Models\Voter;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoterSeeder extends Seeder
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
		$this->faker = Factory::create('ar-eg');

		$voters = collect(array_fill(0, 1000, []))->map(function ($item) use ($committees, $areas, $genders, $letters) {
			$name = $this->faker->words(4, true);
			$nameParts = explode(' ', $name);
			return [
				'circuit_no' => $this->faker->randomNumber(1),
				'parlmaint_no' => $this->faker->randomNumber(2),
				'parlmaint_name' => $this->faker->word(),
				'parlmaint_type' => $this->faker->randomElement([1, 2]),
				'register_number' => $this->faker->randomNumber(3),
				'register_date' => $this->faker->date('Y-m-d', '-5 years'),
				'moi_reference' => $this->faker->randomNumber(7),
				'full_name' => $name,
				'name_1' => $nameParts[0],
				'name_2' => $nameParts[1],
				'name_3' => $nameParts[2],
				'name_4' => $nameParts[3],
				'birth_day' => $this->faker->date('Y-m-d', '-20 years'),
				'job' => $this->faker->word(),
				'address' => $this->faker->sentence(),
				'register_status' => '',
				'phone' => $this->faker->phoneNumber(),
				'attended' => $this->faker->boolean(),
				'targeted' => $this->faker->boolean(),
				'letter_id' => $letters->random(1)->first()->id,
				'gender_id' => $genders->random(1)->first()->id,
				'area_id' => $areas->random(1)->first()->id,
				'committee_id' => $committees->random(1)->first()->id,
			];
		})->all();
		Voter::insert($voters);
	}
}
