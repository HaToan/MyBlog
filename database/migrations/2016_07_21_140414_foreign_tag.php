<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ForeignTag extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('tags', function (Blueprint $table) {
				$table->foreign('media_id')->references('id')->on('media')->onDelete('set null');

			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('tags', function (Blueprint $table) {
				$table->dropForeign('tags_media_id_foreign');

			});
	}
}
