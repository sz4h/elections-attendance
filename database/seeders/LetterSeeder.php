<?php

namespace Database\Seeders;

use App\Models\Letter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LetterSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$letters = collect([
			'ا',
			'ب',
			'ت',
			'ث',
			'ج',
			'ح',
			'خ',
			'د',
			'ذ',
			'ر',
			'ز',
			'س',
			'ش',
			'ص',
			'ض',
			'ط',
			'ظ',
			'ع',
			'غ',
			'ف',
			'ق',
			'ك',
			'ل',
			'م',
			'ن',
			'ه',
			'و',
			'ي',
		])->map(fn($letter) => ['name' => $letter])->all();
		Letter::insert($letters);
	}
}
