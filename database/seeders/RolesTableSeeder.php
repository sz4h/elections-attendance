<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
	public function run()
	{
		$roles = [
			[
				'id' => 1,
				'title' => 'مدير',
			],
			[
				'id' => 2,
				'title' => 'مسؤول',
			],
			[
				'id' => 3,
				'title' => 'مندوب',
			],
		];

		Role::insert($roles);
	}
}
