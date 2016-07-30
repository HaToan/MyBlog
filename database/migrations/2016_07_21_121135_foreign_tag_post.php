<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ForeignTagPost extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('tag_post', function (Blueprint $table) {
				$table->foreign('id_post')->references('id')->on('posts')->onDelete('cascade');

				$table->foreign('id_tag')->references('id')->on('tags')->onDelete('cascade');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('tag_post', function (Blueprint $table) {
				$table->dropForeign('tag_post_id_post_foreign');
				$table->dropForeign('tag_post_id_tag_foreign');
			});
	}
}
