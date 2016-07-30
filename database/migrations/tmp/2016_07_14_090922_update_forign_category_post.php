<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateForignCategoryPost extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('category_post', function (Blueprint $table) {

				$table->foreign('id_post')->references('id')->on('posts')->onDelete('cascade');
				$table->foreign('id_category')->references('id')->on('categorys')->onDelete('cascade');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('category_post', function (Blueprint $table) {
				//
				$table->dropForeign('category_post_id_post_foreign');
				$table->dropForeign('category_post_id_category_foreign');
			});
	}
}
