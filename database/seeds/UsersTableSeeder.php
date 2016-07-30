<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('users')->insert([
				['fullname' => 'Ha Van Toan', 'email' => 'kma.toanfanta@gmail.com', 'username' => 'HaToan', 'password' => bcrypt('123456'), 'level' => 1],

			]);
	}
}
