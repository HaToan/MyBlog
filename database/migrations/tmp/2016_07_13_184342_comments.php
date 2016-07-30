<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Comments extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('comments', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('id_user')->unsigned();
				$table->integer('id_post')->unsigned();
				$table->longText('content');
				$table->timestamps();

				// $table->foreign('id_user')->references('id')->on('users');
				// $table->foreign('id_post')->references('id')->on('posts');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('comments');
	}
}
