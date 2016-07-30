<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller {
	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	 */

	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	/**
	 * Where to redirect users after login / registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware($this->guestMiddleware(), ['except' => 'logout']);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return Validator::make($data, [
				'name'     => 'required|max:255',
				'email'    => 'required|email|max:255|unique:users',
				'password' => 'required|min:6|confirmed',
			]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	protected function create(array $data) {
		return Users::create([
				'name'     => $data['name'],
				'email'    => $data['email'],
				'password' => bcrypt($data['password']),
			]);
	}

	public function loginAdmin() {
		return view('admin.login');
	}

	public function postLoginAdmin(Request $request) {
		$this->validate($request, [
				'email'    => 'required|max:200',
				'password' => 'required|max:200',
			], [
				'email.required'    => 'Field email is not null',
				'email.max'         => 'Email lesser 200 character',
				'passwrod.required' => 'Field passsword is not null',
				'password.max'      => 'Password lesser 200 character'
			]);

		echo $request->email.$request->password;
		$auth_email    = array('email'    => $request->email, 'password'    => $request->password);
		$auth_username = array('username' => $request->email, 'password' => $request->password);

		if (Auth::attempt($auth_email) or Auth::attempt($auth_username)) {
			return redirect()->route('dashboard');
		} else {
			return redirect()->route('login')->with('error', 'Username or Password incorret');
		}

	}
	public function logout() {
		if (Auth::check()) {
			Auth::logout();
		}

		return redirect()->route('login');
	}
}
