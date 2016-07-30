<?php

namespace App\Http\Controllers;

use App\Users;

use Illuminate\Http\Request;

class UsersController extends Controller {
	public function getList() {
		$user = Users::all();
		return view('admin.user.list', ['user' => $user]);
	}

	public function add() {
		return view('admin.user.add');
	}

	public function postAdd(Request $request) {
		$this->validate($request,
			[
				'username' => 'required|min:3|max:200',
				'email'    => 'required|min:3|max:200',
				'password' => 'required|max:200',
			], [
				'username.required' => "Field username isn't null",
				'username.min'      => 'Length of string greater 3',
				'username.max'      => 'Length of string lesser 200',
				'email.required'    => "Field email isn't null",
				'email.min'         => 'Length of string greater 3',
				'email.max'         => 'Length of string lesser 200',
				'password.required' => "Field password isn't null",
				'password.max'      => 'Length of string lesser 200',

			]);
		$user                 = new Users;
		$user->fullname       = $request->fullname;
		$user->username       = $request->username;
		$user->email          = $request->email;
		$user->level          = $request->level;
		$user->remember_token = $request->_token;
		$user->media_id       = $request->avatar;
		$user->description    = $request->description;

		if ($request->password != $request->confirmpassword) {
			return redirect('admin/user/add')->with('error', "These passwords don't match. Try again?");
		}

		$user->password = bcrypt($request->password);

		$user->save();

		return redirect('admin/user/add')->with('messages', 'Insert Complete');
	}

	public function edit($id) {
		$user = Users::find($id);
		return view('admin.user.edit', ['user' => $user]);
	}

	public function postEdit(Request $request, $id) {
		$this->validate($request,
			[
				'username' => 'required|min:3|max:200',
				'email'    => 'required|min:3|max:200',
				'password' => 'required|max:200',
			], [
				'username.required' => "Field username isn't null",
				'username.min'      => 'Length of string greater 3',
				'username.max'      => 'Length of string lesser 200',
				'email.required'    => "Field email isn't null",
				'email.min'         => 'Length of string greater 3',
				'email.max'         => 'Length of string lesser 200',
				'password.required' => "Field password isn't null",
				'password.max'      => 'Length of string lesser 200',

			]);
		$user                 = Users::find($id);
		$user->fullname       = $request->fullname;
		$user->username       = $request->username;
		$user->email          = $request->email;
		$user->level          = $request->level;
		$user->remember_token = $request->_token;
		$user->media_id       = $request->avatar;
		$user->description    = $request->description;

		if ($request->password != $request->confirmpassword) {
			return redirect('admin/user/edit/'.$id)->with('error', "These passwords don't match. Try again?");
		}

		$user->password = bcrypt($request->password);

		$user->save();

		return redirect('admin/user/edit/'.$id)->with('messages', 'Insert Complete');
	}

	public function delete($id) {
		$user = Users::find($id);
		if (!empty($user->avatar)) {
			unlink('uploads/user/'.$user->avatar);
		}

		$user->delete();

		return redirect('admin/user/list');
	}

}
