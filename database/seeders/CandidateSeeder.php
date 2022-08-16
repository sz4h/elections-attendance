<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$candidates = [
			['name' => 'حمدان العازمي'],
			['name' => 'بدر الداهوم'],
			['name' => 'مبارك الصيفي'],
			['name' => 'مبارك العجمي'],
			['name' => 'خالد العتيبي'],
			['name' => 'محمد الدويلة'],
			['name' => 'صالح المطيري'],
		];
		Candidate::insert($candidates);
	}
}
