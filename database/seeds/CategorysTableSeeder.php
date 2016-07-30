<?php

use Illuminate\Database\Seeder;

class CategorysTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('categorys')->insert([
				['name' => str_random(3).'abc', 'slug' => str_random(3).'abc'],
				['name' => str_random(3).'abc', 'slug' => str_random(3).'abc'],
				['name' => str_random(3).'abc', 'slug' => str_random(3).'abc'],
				['name' => str_random(3).'abc', 'slug' => str_random(3).'abc'],
				['name' => str_random(3).'abc', 'slug' => str_random(3).'abc'],
				['name' => str_random(3).'abc', 'slug' => str_random(3).'abc']
			]);
	}

}
