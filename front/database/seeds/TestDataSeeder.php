<?php

use App\Domain;
use App\User;
use Illuminate\Database\Seeder;
use Bican\Roles\Models\Role;

class TestDataSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$user = User::create([
			'name' => 'tester',
			'email' => 'test@example.com',
			'password' => bcrypt('123456'),
		]);

		$userRole = Role::where('slug', 'admin')->first();
		$user->attachRole($userRole);

		$domain1 = Domain::create([
			'name' => 'example com',
			'url' => 'example.com',
			'user_id' => $user->id,
			'verified_at' => null
		]);

		$domain2 = Domain::create([
			'name' => 'example org',
			'url' => 'example.org',
			'user_id' => $user->id,
			'verified_at' => null
		]);
//
		$user->domains()->save($domain1);
		$user->domains()->save($domain2);
	}
}
