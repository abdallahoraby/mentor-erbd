<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		$user = (request()->ajax()) ? $this->user_id : $this->user;

		return [
			'name' => 'required|string',
			'email' => 'sometimes|nullable|string|email|max:255|unique:users,email,' . $user,
			'password' => 'sometimes|nullable|string|min:6',
			'phone' => 'sometimes|nullable|string|unique:users,phone,' . $user,
		];

	}
}
