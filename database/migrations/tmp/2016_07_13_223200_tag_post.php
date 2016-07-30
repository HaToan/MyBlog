<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class TagPost extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('tag_post', function (Blueprint $table) {
				$table->integer('id_tag')->unsigned();
				$table->integer('id_post')->unsigned();
				$table->primary(['id_tag', 'id_post']);
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('tag_post');
	}
}
