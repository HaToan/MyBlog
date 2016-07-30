<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Slides extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('slides', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name');
				$table->string('images');
				$table->mediumText('content');
				$table->string('links');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('slides');
	}
}
