<?php

namespace Database\Seeders;

use App\Models\Committee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommitteeSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$committees = [
			['name' => 'اللجنة الاولى'],
			['name' => 'اللجنة الثانية'],
			['name' => 'اللجنة الثالثة'],
		];
		Committee::insert($committees);
	}
}
