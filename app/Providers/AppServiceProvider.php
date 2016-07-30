<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {

		view()->share('path_images', 'uploads/media/');
		view()->share('uri_category', 'category/');
		view()->share('uri_author', 'author/');
		view()->share('uri_post', 'post/');
		view()->share('html', '.html');
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}
}
