<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */
/**
 *
// get post thuoc categorys id = 1
Route::get('getall_post_in_cate', function () {
$c = App\Categorys::find(1)->posts()->get()->toArray();

echo "<pre>";
print_r($c);
echo "</pre>";
});

// get category thuoc post id = 1
Route::get('getall_cate_in_post', function () {
$cate = App\Posts::find(1)->category()->get()->toArray();

echo "<pre>";
print_r($cate);
echo "</pre>";
});

Route::get('getall_tag_in_post', function () {
$cate = App\Posts::find(3)->tags()->get()->toArray();

echo "<pre>";
print_r($cate);
echo "</pre>";
});

Route::get('getall_post_in_tag', function () {
$c = App\Tags::find(1)->posts()->get()->toArray();

echo "<pre>";
print_r($c);
echo "</pre>";
});

Route::get('admin', function () {
return view('admin.index.content');
});

Route::get('testauthor', function () {
$p = App\Posts::find(12)->users()->get()->toArray();
echo "<pre>";
print_r($p);
echo "</pre>";
});
 */

$html = ".html";

/**
 * Interface
 */
Route::get('home'.$html, ['as' => 'home', 'uses' => 'HomeController@getHome']);
Route::get('/', function () {
		return redirect()->route('home');
	});

// group category
Route::group(['prefix' => 'category'], function () {
		$html = ".html";

		Route::get('categorys'.$html, ['as' => 'categorys', 'uses' => 'HomeController@category']);
		Route::get('/', function () {
				return redirect()->route('categorys');
			});

		Route::get('{id}/{category_slug}'.$html, ['as' => 'postcategory', 'uses' => 'HomeController@getPost_Category']);
	});

Route::get('post/{id}/{slug}'.$html, ['uses' => 'HomeController@getPost']);

Route::get('about'.$html, ['as'   => 'about', 'uses'   => 'HomeController@about']);
Route::get('contact'.$html, ['as' => 'contact', 'uses' => 'HomeController@contact']);

/**
 * admin
 */
Route::get('admin/login', ['as' => 'login', 'uses' => 'Auth\AuthController@loginAdmin']);
Route::post('admin/login', 'Auth\AuthController@postLoginAdmin');
Route::get('admin/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {
		Route::get('/', function () {
				return view('admin.index.content');
			})->name('dashboard');

		Route::group(['prefix' => 'category'], function () {
				Route::get('/', 'CategorysController@getList');
				Route::get('list', 'CategorysController@getList');

				Route::get('add', 'CategorysController@add');
				Route::post('add', 'CategorysController@postAdd');

				Route::get('edit/{id}', 'CategorysController@edit');
				Route::post('edit/{id}', 'CategorysController@postEdit');
				Route::get('delete/{id}', 'CategorysController@delete');
			});

		Route::group(['prefix' => 'tag'], function () {
				Route::get('/', 'TagsController@getList');
				Route::get('list', 'TagsController@getList');

				Route::get('add', 'TagsController@add');
				Route::post('add', 'TagsController@postAdd');

				Route::get('edit/{id}', 'TagsController@edit');
				Route::post('edit/{id}', 'TagsController@postEdit');
				Route::get('delete/{id}', 'TagsController@delete');
			});

		Route::group(['prefix' => 'post'], function () {
				Route::get('/', 'PostsController@getList');
				Route::get('list', 'PostsController@getList');

				Route::get('add', 'PostsController@add');
				Route::post('add', 'PostsController@postAdd');

				Route::get('edit/{id}', 'PostsController@edit');
				Route::post('edit/{id}', 'PostsController@postEdit');
				Route::get('delete/{id}', 'PostsController@delete');
			});

		Route::group(['prefix' => 'user'], function () {
				Route::get('/', 'UsersController@getList');
				Route::get('list', 'UsersController@getList');

				Route::get('add', 'UsersController@add');
				Route::post('add', 'UsersController@postAdd');

				Route::get('edit/{id}', 'UsersController@edit');
				Route::post('edit/{id}', 'UsersController@postEdit');
				Route::get('delete/{id}', 'UsersController@delete');
			});

		Route::group(['prefix' => 'slide'], function () {
				Route::get('/', 'SlideController@getList');
				Route::get('list', 'SlideController@getList');

				Route::get('add', 'SlideController@add');
				Route::post('add', 'SlideController@postAdd');

				Route::get('edit/{id}', 'SlideController@edit');
				Route::post('edit/{id}', 'SlideController@postEdit');
				Route::get('delete/{id}', 'SlideController@delete');
			});

		Route::group(['prefix' => 'comment'], function () {
				Route::get('delete/{id}/{id_post}', 'CommentsController@delete');
			});

	});

Route::group(['prefix' => 'js', 'middleware' => 'adminLogin'], function () {
		Route::post('images', 'jsController@Images');
		Route::get('load-images', 'jsController@loadImages');
		Route::post('deleteimages', 'jsController@deleteImages');

		Route::post('addtag', 'jsController@addTag');
		Route::get('listtags', 'jsController@listTags');
		Route::post('tagsofpost', 'jsController@cbIsCheckedTag');

		Route::get('listcategory', 'jsController@listCategories');
		Route::get('listcategoryparent', 'jsController@lisCateParent');
		Route::post('addcategory', 'jsController@addCategory');
		Route::post('cateofpost', 'jsController@cbIsChecked');
	});

Route::get('test', function () {
		return view('admin.test');
	});
