<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EditPost extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('posts', function (Blueprint $table) {
				$table->boolean('post_status');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('posts', function (Blueprint $table) {
				$table->dropColumn('post_status');
			});
	}
}
