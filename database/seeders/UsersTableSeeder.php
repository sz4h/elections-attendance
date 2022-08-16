<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
	public function run()
	{
		$users = [
			[
				'id' => 1,
				'name' => 'Admin',
				'email' => 'admin@admin.com',
				'phone' => '66666666',
				'password' => bcrypt('Password@123'),
				'remember_token' => null,
			],
			[
				'id' => 2,
				'name' => 'Moderator',
				'email' => 'mod@mod.com',
				'phone' => '55555555',
				'password' => bcrypt('Password@123'),
				'remember_token' => null,
			],
			[
				'id' => 3,
				'name' => 'Mandoob',
				'email' => 'mandoob@mandoob.com',
				'phone' => '22222222',
				'password' => bcrypt('password'),
				'remember_token' => null,
			],
		];

		User::insert($users);
	}
}
