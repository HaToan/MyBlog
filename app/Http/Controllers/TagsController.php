<?php

namespace App\Http\Controllers;

use App\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller {
	public function getList() {
		$data = Tags::all();

		return view('admin.tag.list', ['tags' => $data]);
	}

	public function add() {
		return view('admin.tag.add');
	}

	public function postAdd(Request $request) {
		$this->validate($request,
			[
				'name' => 'required|min:3|max:100'
			],
			[
				'name.required' => "Field name is not null",
				'name.min'      => 'Length of string greater 3',
				'name.max'      => 'Length of string lesser 100'
			]);

		if ($request->slug == "") {
			$slug = changeTitle($request->name);
		} else {
			$slug = changeTitle($request->slug);
		}

		$tag              = new Tags;
		$tag->name        = $request->name;
		$tag->slug        = $slug;
		$tag->description = $request->description;
		$tag->save();

		return redirect('admin/tag/add')->with('messages', 'Insert Complete!');
	}

	public function edit($id) {
		$tag = Tags::find($id);
		return view('admin.tag.edit', ['tag' => $tag]);
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

		$tag              = Tags::find($id);
		$tag->name        = $request->name;
		$tag->slug        = $slug;
		$tag->description = $request->description;
		$tag->save();

		return redirect('admin/tag/edit/'.$id)->with('messages', 'Update Complete!');
	}

	public function delete($id) {
		$tag = Tags::find($id);
		$tag->delete();

		return redirect('admin/tag/')->with('messages', 'Delete Complete!');
	}
}
