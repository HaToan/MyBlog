<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CategoryPost extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('category_post', function (Blueprint $table) {
				$table->integer('id_category')->unsigned();
				$table->integer('id_post')->unsigned();
				$table->primary(['id_category', 'id_post']);
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('category_post');
	}
}
