<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Flash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Register Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles the registration of new users as well as their
		    | validation and creation. By default this controller uses a trait to
		    | provide this functionality without requiring any additional code.
		    |
	*/

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {

		return Validator::make($data, [
			'name' => ['required', 'string', 'max:255'],
			'first_name' => ['sometimes', 'nullable', 'string', 'max:255'],
			'last_name' => ['sometimes', 'nullable', 'string', 'max:255'],
			'phone' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\Models\User
	 */
	protected function create(array $data) {
		$data['password'] = Hash::make($data['password']);
		return User::create($data);
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
	 */
	public function register(Request $request) {
		$inputs = $request->all();
		$dataValidate = [
			'name' => ['sometimes', 'nullable', 'string', 'max:255'],
			'first_name' => ['sometimes', 'nullable', 'string', 'max:255'],
			'last_name' => ['sometimes', 'nullable', 'string', 'max:255'],
			'phone' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		];
		$request->validateWithBag('register_' . request('type'), $dataValidate);
		event(new Registered($user = $this->create($inputs)));
		Flash::success(__('front.registred_user'));
		$role = (request('type') == 'user') ? 'user' : 'company';
		$user->assignRole($role);

		$this->guard()->login($user);

		if ($response = $this->registered($request, $user)) {
			return $response;
		}

		return $request->wantsJson()
		? new JsonResponse([], 201)
		: redirect($this->redirectPath());
	}
}
