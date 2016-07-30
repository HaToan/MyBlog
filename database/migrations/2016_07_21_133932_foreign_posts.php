<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ForeignPosts extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('posts', function (Blueprint $table) {
				$table->foreign('media_id')->references('id')->on('media')->onDelete('set null');
				$table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('posts', function (Blueprint $table) {
				$table->dropForeign('posts_media_id_foreign');
				$table->dropForeign('posts_user_id_foreign');
			});
	}
}
