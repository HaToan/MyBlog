<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//$this->call(CategorysTableSeeder::class );
		$this->call(UsersTableSeeder::class );
		//$this->call(PostsTableSeeder::class );
		//$this->call(category_post::class );
		//$this->call(tags::class );
		//$this->call(tag_post::class );
	}

}

class tag_post extends Seeder {
	public function run() {
		DB::table('tag_post')->insert([
				['id_tag' => 1, 'id_post' => 2],
				['id_tag' => 1, 'id_post' => 3],
				['id_tag' => 1, 'id_post' => 4],
				['id_tag' => 2, 'id_post' => 3],
				['id_tag' => 3, 'id_post' => 3],
				['id_tag' => 3, 'id_post' => 4],
				['id_tag' => 5, 'id_post' => 1],
			]);
	}
}

class tags extends Seeder {
	public function run() {
		DB::table('tags')->insert([
				['name' => "abcd", 'slug' => "abcd", 'description' => 'nhac'],
				['name' => "abc", 'slug' => "abcd", 'description' => 'nhac'],
				['name' => "ab", 'slug' => "abcd", 'description' => 'nhac'],
				['name' => "a", 'slug' => "abcd", 'description' => 'nhac'],
				['name' => "abcde", 'slug' => "abcd", 'description' => 'nhac'],
				['name' => "abcef", 'slug' => "abcd", 'description' => 'nhac']

			]);
	}
}

class category_post extends Seeder {
	public function run() {
		DB::table('category_post')->insert([
				['id_category' => 1, 'id_post' => 1],
				['id_category' => 1, 'id_post' => 2],
				['id_category' => 1, 'id_post' => 3],
				['id_category' => 2, 'id_post' => 3],
				['id_category' => 2, 'id_post' => 4],
				['id_category' => 2, 'id_post' => 5],
				['id_category' => 3, 'id_post' => 2],
				['id_category' => 3, 'id_post' => 5],
				['id_category' => 3, 'id_post' => 6],
				['id_category' => 4, 'id_post' => 1],
				['id_category' => 4, 'id_post' => 2],
			]);
	}
}