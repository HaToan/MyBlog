<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

class CategorysController extends Controller {
	public function getList() {
		$data = Categories::all();

		return view('admin.category.list', ['categorys' => $data]);
	}

	public function add() {
		$category = Categories::select('name', 'id')->get();
		return view('admin.category.add', ['category' => $category]);
	}

	public function postAdd(Request $request) {
		$this->validate($request,
			[
				'name' => 'required|min:3|max:100'
			],
			[
				'name.required' => "Not NuLL",
				'name.min'      => 'Length of string greater 3',
				'name.max'      => 'Length of string lesser 100'
			]);

		if ($request->slug == "") {
			$slug = changeTitle($request->name);
		} else {
			$slug = changeTitle($request->slug);
		}

		$category              = new Categories;
		$category->name        = $request->name;
		$category->slug        = $slug;
		$category->description = $request->description;
		$category->media_id    = $request->images;
		$category->parent_id   = $request->parentcategory;
		$category->save();

		return redirect('admin/category/add')->with('messages', 'Insert Complete!');
	}

	public function edit($id) {
		$category = Categories::find($id);
		$cateall  = Categories::select('id', 'name')->get();
		return view('admin.category.edit', ['category' => $category, 'cateall' => $cateall]);
	}

	public function postEdit(Request $request, $id) {
		$this->validate($request,
			[
				'name' => 'required|min:3|max:100'
			],
			[
				'name.required' => "Not NuLL",
				'name.min'      => 'Length of string greater 3',
				'name.max'      => 'Length of string lesser 100'
			]);

		if ($request->slug == "") {
			$slug = changeTitle($request->name);
		} else {
			$slug = changeTitle($request->slug);
		}

		$category              = Categories::find($id);
		$category->name        = $request->name;
		$category->slug        = $slug;
		$category->description = $request->description;
		$category->media_id    = $request->images;
		$category->parent_id   = $request->parentcategory;

		$category->save();

		return redirect('admin/category/edit/'.$id)->with('messages', 'Update Complete!');
	}

	public function delete($id) {
		$category = Categories::find($id);
		$category->delete();

		return redirect('admin/category/')->with('messages', 'Delete Complete!');
	}

}
// echo "<pre>";
// print_r($data);
// echo "</pre>";