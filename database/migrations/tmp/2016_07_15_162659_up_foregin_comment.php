<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpForeginComment extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('comments', function (Blueprint $table) {
				$table->foreign('id_post')->references('id')->on('posts')->onDelete('cascade');
				$table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('comments', function (Blueprint $table) {
				$table->dropForeign('comments_id_user_foreign');
				$table->dropForeign('comments_id_post_foreign');
			});
	}
}
