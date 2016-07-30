<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ForeignCategory extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('categories', function (Blueprint $table) {
				$table->foreign('media_id')->references('id')->on('media')->onDelete('set null');

			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('categories', function (Blueprint $table) {
				$table->dropForeign('categories_media_id_foreign');
			});
	}
}
