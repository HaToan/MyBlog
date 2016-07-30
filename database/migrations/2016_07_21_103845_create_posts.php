<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePosts extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('posts', function (Blueprint $table) {
				$table->increments('id');
				$table->string('title', 100)->unique();
				$table->string('slug', 100)->unique();
				$table->string('description', 150)->nullable();
				$table->mediumText('content');
				$table->integer('media_id')->unsigned()->nullable();
				$table->integer('views')->unsigned()->nullable();
				$table->integer('user_id')->unsigned()->nullable();
				$table->boolean('status');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('posts');
	}
}
