<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
	public function run()
	{
		$permissions = [
			[
				'id' => 1,
				'title' => 'user_management_access',
			],
			[
				'id' => 2,
				'title' => 'permission_create',
			],
			[
				'id' => 3,
				'title' => 'permission_edit',
			],
			[
				'id' => 4,
				'title' => 'permission_show',
			],
			[
				'id' => 5,
				'title' => 'permission_delete',
			],
			[
				'id' => 6,
				'title' => 'permission_access',
			],
			[
				'id' => 7,
				'title' => 'role_create',
			],
			[
				'id' => 8,
				'title' => 'role_edit',
			],
			[
				'id' => 9,
				'title' => 'role_show',
			],
			[
				'id' => 10,
				'title' => 'role_delete',
			],
			[
				'id' => 11,
				'title' => 'role_access',
			],
			[
				'id' => 12,
				'title' => 'user_create',
			],
			[
				'id' => 13,
				'title' => 'user_edit',
			],
			[
				'id' => 14,
				'title' => 'user_show',
			],
			[
				'id' => 15,
				'title' => 'user_delete',
			],
			[
				'id' => 16,
				'title' => 'user_access',
			],
			[
				'id' => 17,
				'title' => 'candidate_create',
			],
			[
				'id' => 18,
				'title' => 'candidate_edit',
			],
			[
				'id' => 19,
				'title' => 'candidate_show',
			],
			[
				'id' => 20,
				'title' => 'candidate_delete',
			],
			[
				'id' => 21,
				'title' => 'candidate_access',
			],
			[
				'id' => 22,
				'title' => 'committee_create',
			],
			[
				'id' => 23,
				'title' => 'committee_edit',
			],
			[
				'id' => 24,
				'title' => 'committee_show',
			],
			[
				'id' => 25,
				'title' => 'committee_delete',
			],
			[
				'id' => 26,
				'title' => 'committee_access',
			],
			[
				'id' => 27,
				'title' => 'basic_access',
			],
			[
				'id' => 28,
				'title' => 'area_create',
			],
			[
				'id' => 29,
				'title' => 'area_edit',
			],
			[
				'id' => 30,
				'title' => 'area_show',
			],
			[
				'id' => 31,
				'title' => 'area_delete',
			],
			[
				'id' => 32,
				'title' => 'area_access',
			],
			[
				'id' => 33,
				'title' => 'gender_create',
			],
			[
				'id' => 34,
				'title' => 'gender_edit',
			],
			[
				'id' => 35,
				'title' => 'gender_show',
			],
			[
				'id' => 36,
				'title' => 'gender_delete',
			],
			[
				'id' => 37,
				'title' => 'gender_access',
			],
			[
				'id' => 38,
				'title' => 'letter_create',
			],
			[
				'id' => 39,
				'title' => 'letter_edit',
			],
			[
				'id' => 40,
				'title' => 'letter_show',
			],
			[
				'id' => 41,
				'title' => 'letter_delete',
			],
			[
				'id' => 42,
				'title' => 'letter_access',
			],
			[
				'id' => 43,
				'title' => 'assignment_create',
			],
			[
				'id' => 44,
				'title' => 'assignment_edit',
			],
			[
				'id' => 45,
				'title' => 'assignment_show',
			],
			[
				'id' => 46,
				'title' => 'assignment_delete',
			],
			[
				'id' => 47,
				'title' => 'assignment_access',
			],
			[
				'id' => 48,
				'title' => 'voter_create',
			],
			[
				'id' => 49,
				'title' => 'voter_edit',
			],
			[
				'id' => 50,
				'title' => 'voter_show',
			],
			[
				'id' => 51,
				'title' => 'voter_delete',
			],
			[
				'id' => 52,
				'title' => 'voter_access',
			],
			[
				'id' => 53,
				'title' => 'result_create',
			],
			[
				'id' => 54,
				'title' => 'result_edit',
			],
			[
				'id' => 55,
				'title' => 'result_show',
			],
			[
				'id' => 56,
				'title' => 'result_delete',
			],
			[
				'id' => 57,
				'title' => 'result_access',
			],
			[
				'id' => 58,
				'title' => 'importer_create',
			],
			[
				'id' => 59,
				'title' => 'importer_edit',
			],
			[
				'id' => 60,
				'title' => 'importer_show',
			],
			[
				'id' => 61,
				'title' => 'importer_delete',
			],
			[
				'id' => 62,
				'title' => 'importer_access',
			],
			[
				'id' => 63,
				'title' => 'report_create',
			],
			[
				'id' => 64,
				'title' => 'report_edit',
			],
			[
				'id' => 65,
				'title' => 'report_show',
			],
			[
				'id' => 66,
				'title' => 'report_delete',
			],
			[
				'id' => 67,
				'title' => 'report_access',
			],
			[
				'id' => 68,
				'title' => 'audit_log_show',
			],
			[
				'id' => 69,
				'title' => 'audit_log_access',
			],
			[
				'id' => 70,
				'title' => 'profile_password_edit',
			],
			[
				'id' => 71,
				'title' => 'dashboard_access',
			],
			[
				'id' => 72,
				'title' => 'attend_access',
			],
		];

		Permission::insert($permissions);
	}
}
