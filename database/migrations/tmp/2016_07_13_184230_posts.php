<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Posts extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('posts', function (Blueprint $table) {
				$table->increments('id');
				$table->string('title');
				$table->string('slug');
				$table->string('description');
				$table->mediumText('content');
				$table->string('images');
				$table->integer('display');
				$table->integer('views');
				$table->integer('id_user')->unsigned()->nullable();
				$table->timestamps();

				// foreign key
				// $table->foreign('id_user')->references('id')->on('users');
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
