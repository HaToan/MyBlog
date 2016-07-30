<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategories extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('categories', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name', 80)->unique();
				$table->string('slug', 80)->unique();
				$table->string('description', 150)->nullable();
				$table->timestamps();

				$table->integer('media_id')->unsigned()->nullable();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('categories');
	}
}
