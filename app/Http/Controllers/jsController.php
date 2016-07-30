<?php

namespace App\Http\Controllers;
use App\Categories;
use App\Media;
use App\Posts;
use App\Tags;
use Illuminate\Http\Request;

class jsController extends Controller {
	public function Images(Request $request) {

		if ($request->hasFile('file')) {

			$file        = $request->file('file');
			$dot         = $file->getClientOriginalExtension();
			$filenameC   = $file->getClientOriginalName();
			$filename    = date('Y-m-d-H-i-s')."_".$filenameC;
			$filesize    = $file->getClientSize();
			$maxFilesize = $file->getMaxFilesize();
			$type        = $file->getMimeType();

			if ($dot != 'jpg' && $dot != 'png' && $dot != 'jpeg') {
				die('Choose file jpg, png, jpeg');

			}

			$file->move("uploads/media", $filename);
			// insert
			$media       = new Media;
			$media->name = $filename;
			$media->save();
			echo "Upload success!";

		} else {
			$post->images = "";
		}

	}
	public function loadImages() {
		$media = Media::all()->toJson();
		echo $media;
	}

	public function deleteImages(Request $request) {
		$media = Media::find($request->id);
		unlink('uploads/media/'.$media->name);
		$media->delete();
		echo "Delete success";
	}

	/**
	 * Processing Tags
	 * @param       Request                  $request [description]
	 * @version     [version]
	 * @date        2016-07-23
	 * @anotherdate 2016-07-23T19:23:54+0700
	 */
	public function addTag(Request $request) {
		$tag       = new Tags;
		$tag->name = $request->tag;
		$tag->slug = changeTitle($request->tag);
		$tag->save();
		echo "add tag success!";
	}

	public function listTags() {
		$tag = Tags::all()->toJson();
		echo $tag;
	}

	public function cbIsCheckedTag(Request $request) {
		$tags = Posts::find($request->id)->tags;
		echo $tags;
	}

	/**
	 * categories
	 */

	public function listCategories() {
		$category = Categories::all();
		echo $category->toJson();
	}

	public function lisCateParent($id) {
		$parent_cate = Categories::find($id)->parent;
		echo $parent_cate;
	}

	public function addCategory(Request $request) {
		$cate            = new Categories;
		$cate->name      = $request->categoryname;
		$cate->parent_id = $request->parent_id;
		$cate->slug      = changeTitle($request->categoryname);

		$cate->save();
		echo "Add categoru succes";
	}

	public function cbIsChecked(Request $request) {
		$cateofpost = Posts::find($request->id)->categories;
		echo $cateofpost;
	}
}
