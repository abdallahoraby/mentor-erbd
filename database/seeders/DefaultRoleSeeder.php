<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class DefaultRoleSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$roles[] = [
			'name' => 'Admin',
			'display_name' => 'Admin',
			'description' => 'Admin',
		];

		foreach ($roles as $role) {
			Role::create($role);
		}
	}
}
