<?php

namespace App\Http\Controllers;

use App\Category_Post;

use App\Posts;

use App\Tag_Post;
use App\Users;

use Illuminate\Http\Request;

class PostsController extends Controller {

	public function getList() {
		$post = Posts::orderBy('id', 'DESC')->get();

		return view('admin.post.list', ['posts' => $post]);
	}

	public function add() {
		$author = Users::all();

		return view('admin.post.add', ['author' => $author]);
	}

	public function postAdd(Request $request) {
		$this->validate($request, [
				'title'       => 'required|min:3|max:200',
				'description' => 'max:500',
				'content'     => 'required'
			], [
				'title.required'       => 'Field title is not null',
				'title.min'            => 'Please enter string geater 3',
				'title.max'            => 'Please enter string lesser 200',
				'description.required' => 'Field description is not null',
				'content.required'     => 'Field content is not null'
			]);

		$post              = new Posts;
		$post->title       = $request->title;
		$post->slug        = changeTitle($request->title);
		$post->description = $request->description;
		$post->content     = $request->content;
		$post->status      = $request->poststatus;
		$post->views       = 0;
		$post->user_id     = $request->author;
		$post->media_id    = $request->images;
		$post->save();

		$post       = Posts::orderBy('id', 'DESC')->take(1)->get()[0];
		$array_cate = $request->get('categories');
		foreach ($array_cate as $id_category) {
			$cate_post              = new Category_Post;
			$cate_post->id_post     = $post->id;
			$cate_post->id_category = $id_category;
			$cate_post->save();
		}

		$array_tag = $request->get('tag');
		foreach ($array_tag as $id_tag) {
			$tag_post          = new Tag_Post;
			$tag_post->id_post = $post->id;
			$tag_post->id_tag  = $id_tag;
			$tag_post->save();
		}

		return redirect('admin/post/add')->with('messages', 'Insert Complete!');
	}

	public function delete($id) {
		$post = Posts::find($id);
		$post->delete();
		return redirect('admin/post/')->with('messages', 'Delete Complete!');
	}

	public function edit($id) {
		$post  = Posts::find($id);
		$users = Users::all();

		return view('admin.post.edit', ['post' => $post, 'users' => $users]);
	}

	public function postEdit(Request $request, $id) {
		$this->validate($request, [
				'title'       => 'required|min:3|max:200',
				'description' => 'max:500',
				'content'     => 'required'
			], [
				'title.required'       => 'Field title is not null',
				'title.min'            => 'Please enter string geater 3',
				'title.max'            => 'Please enter string lesser 200',
				'description.required' => 'Field description is not null',
				'content.required'     => 'Field content is not null'
			]);

		$post              = Posts::find($id);
		$post->title       = $request->title;
		$post->slug        = changeTitle($request->title);
		$post->description = $request->description;
		$post->content     = $request->content;
		$post->status      = $request->poststatus;
		$post->views       = 0;
		$post->user_id     = $request->author;
		$post->media_id    = $request->images;
		$post->save();

		$cateofpost = Posts::find($id)->categories;
		$array_cate = $request->get('categories');
		if (!empty($array_cate)) {
			foreach ($cateofpost as $cate) {
				// cate in database unchecked ->delete
				$check = false;
				foreach ($array_cate as $cate_id) {
					if ($cate->id == $cate_id) {
						$check = true;
						break;
					}
				}
				if (!$check) {
					Category_Post::where('id_post', $id)->where('id_category', $cate->id)->delete();
				}
			}

			//add new
			foreach ($array_cate as $cate_id) {

				// cate not in database add
				$check = false;
				foreach ($cateofpost as $cate) {

					if ($cate->id == $cate_id) {
						$check = true;
						break;
					}
				}
				if (!$check) {
					$cate_post              = new Category_Post;
					$cate_post->id_post     = $id;
					$cate_post->id_category = $cate_id;
					$cate_post->save();
				}
			}

		}

		/**
		 * tags
		 */

		$cateofpost = Posts::find($id)->tags;
		$array_cate = $request->get('tag');
		if (!empty($array_cate)) {
			foreach ($cateofpost as $cate) {
				// cate in database unchecked ->delete
				$check = false;
				foreach ($array_cate as $cate_id) {
					if ($cate->id == $cate_id) {
						$check = true;
						break;
					}
				}
				if (!$check) {
					Tag_Post::where('id_post', $id)->where('id_tag', $cate->id)->delete();
				}
			}

			//add new
			foreach ($array_cate as $cate_id) {

				// cate not in database add
				$check = false;
				foreach ($cateofpost as $cate) {

					if ($cate->id == $cate_id) {
						$check = true;
						break;
					}
				}
				if (!$check) {
					$cate_post          = new Tag_Post;
					$cate_post->id_post = $id;
					$cate_post->id_tag  = $cate_id;
					$cate_post->save();
				}
			}
		}

		//edit many to many
		// DB::table('category_post')->where('id_category', $post->categorys[0]->id)->where('id_post', $id)->update(['id_category' => $request->category]);

		// DB::table('tag_post')->where('id_tag', $post->tags[0]->id)->where('id_post', $id)->update(['id_tag' => $request->tag]);

		return redirect('admin/post/edit/'.$id)->with('messages', 'Update Complete!');

	}

	public function check($s) {
		echo '<pre>';
		print_r($s);
		echo '</pre>';
	}
}
