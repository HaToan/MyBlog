<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsers extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name', 80)->unique();
				$table->string('fullname');
				$table->string('email', 80)->unique();
				$table->integer('level')->unsigned()->default(5);
				$table->string('password', 150);
				$table->integer('media_id')->unsigned()->nullable();
				$table->mediumText('description')->nullable();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('users');
	}
}
