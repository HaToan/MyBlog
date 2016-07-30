<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMedia extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('media', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name', 100)->unique();
				$table->string('title', 80)->nullable();
				$table->string('caption', 150)->nullable();
				$table->integer('user_id')->unsigned();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('media');
	}
}
