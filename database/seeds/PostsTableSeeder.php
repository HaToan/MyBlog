<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('posts')->insert([
				['title' => str_random(5).'abc', 'slug' => 'abc', 'description' => 'abcd', 'content' => str_random(10)."abcd", 'images' => 'abc', 'display' => 1, 'views' => 1, 'id_user' => 1],
				['title' => str_random(5).'abc', 'slug' => 'abc', 'description' => 'abcd', 'content' => str_random(10)."abcd", 'images' => 'abc', 'display' => 1, 'views' => 1, 'id_user' => 1],
				['title' => str_random(5).'abc', 'slug' => 'abc', 'description' => 'abcd', 'content' => str_random(10)."abcd", 'images' => 'abc', 'display' => 1, 'views' => 1, 'id_user' => 1],
				['title' => str_random(5).'abc', 'slug' => 'abc', 'description' => 'abcd', 'content' => str_random(10)."abcd", 'images' => 'abc', 'display' => 1, 'views' => 1, 'id_user' => 1],
				['title' => str_random(5).'abc', 'slug' => 'abc', 'description' => 'abcd', 'content' => str_random(10)."abcd", 'images' => 'abc', 'display' => 1, 'views' => 1, 'id_user' => 1],
				['title' => str_random(5).'abc', 'slug' => 'abc', 'description' => 'abcd', 'content' => str_random(10)."abcd", 'images' => 'abc', 'display' => 1, 'views' => 1, 'id_user' => 1],
				['title' => str_random(5).'abc', 'slug' => 'abc', 'description' => 'abcd', 'content' => str_random(10)."abcd", 'images' => 'abc', 'display' => 1, 'views' => 1, 'id_user' => 1],
			]);
	}
}
