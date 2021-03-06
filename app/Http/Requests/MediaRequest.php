<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MediaRequest extends Request {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'files' => 'required',
		];
	}

	public function messages() {
		return [
			'files.required' => 'Please enter files',
		];
	}
}
