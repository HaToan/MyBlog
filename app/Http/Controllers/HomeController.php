<?php

namespace App\Http\Controllers;
use App\Categories;
use App\Posts;
use App\Users;
use DB;

class HomeController extends Controller {
	public function __construct() {
		$cate = Categories::orderBy('id', 'DESC')->select('categories.id', 'categories.name', 'categories.slug')->skip(0)->take(6)->get();
		view()->share('cate', $cate);
	}
	// Home
	public function getHome() {

		$featured_post = Posts::orderBy('views', 'DESC')->select(['id', 'title', DB::raw('LEFT(description, 120) as description'), 'slug', 'created_at', 'user_id', 'media_id'])->skip(0)->take(2)->get();

		$most_post = Posts::orderBy('id', 'DESC')->select(['id', 'title', DB::raw('LEFT(description, 120) as description'), 'slug', 'created_at', 'user_id', 'media_id'])->skip(0)->take(9)->get();

		return view('pages.home', ['featured_post' => $featured_post, 'most_post' => $most_post]);

		$this->note($featured_post);
	}

	// List Categorys
	public function category() {
		$categories = Categories::select(['id', 'name', 'slug', 'media_id'])->get();

		return view('pages.list_category', ['categories' => $categories]);
	}

	// Posts Of Category
	public function getPost_Category($id) {
		$category = Categories::where('id', $id)->select(['id', 'name', 'slug', 'media_id'])->get()[0];
		return view('pages.post_category', ['category' => $category]);
	}

	// Post
	public function getPost($id) {
		$post       = Posts::where('id', '=', $id)->select(['id', 'title', 'content', 'slug', 'media_id', 'created_at', 'user_id'])->get()[0];
		$categories = $post->categories()->select(['id'])->take(1)->get()[0];
		$late_posts = $categories->posts()->select('id', 'title', 'created_at', 'description', 'slug', 'media_id', 'user_id')->take(3)->get();
		return view('pages.post', ['post' => $post, 'late_posts' => $late_posts]);
	}

	public function about() {
		$user = Users::find(2)->select(['fullname', 'media_id', 'description'])->get()[0];
		return view('pages.about', ['user' => $user]);
	}

	public function contact() {
		return view('pages.contact');
	}

	public function note($post) {
		echo "<pre>";
		echo print_r($post);
		echo "</pre>";

	}
}
