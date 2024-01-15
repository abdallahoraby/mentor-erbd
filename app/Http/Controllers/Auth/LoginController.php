<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Flash;
use Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Socialite;
use Str;
use \Illuminate\Http\Request;

class LoginController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Login Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles authenticating users for the application and
		    | redirecting them to your home screen. The controller uses a trait
		    | to conveniently provide its functionality to your applications.
		    |
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = 'admin';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest')->except('logout');
	}
	/**
	 * Validate the user login request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return void
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	protected function validateLogin(Request $request) {
		$request->validateWithBag('login', [
			$this->username() => 'required|string',
			'password' => 'required|string',
		]);
	}

	protected function authenticated(Request $request, $user) {
		if ($user->hasRole('admin')) {
			return redirect()->intended('/admin');
		} else {
			return redirect()->intended('/');
		}
	}

	/**
	 * Get the failed login response instance.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	protected function sendFailedLoginResponse(Request $request) {
		return redirect('/')->withErrors([
			$this->username() => [trans('auth.failed')],
		], 'login');
	}

	public function signGoogle() {
		return Socialite::driver('google')->redirect();
	}
	public function signGoogleRedirect() {
		$user = Socialite::driver('google')->user();
		/*
			check if user not exists
		*/
		$user = User::firstOrCreate([
			'email' => $user->email,
		], [
			'name' => $user->name,
			'social' => 1,
			'avatar' => $user->user['picture'] ?? '',
			'password' => Hash::make(Str::random(24)),
		]);

		$user->assignRole('user');
		Auth::login($user, true);
		Flash::success(__('front.registred_user'));
		return redirect('/');
	}

	public function signFacebook() {
		return Socialite::driver('facebook')->redirect();
	}
	public function signFacebookRedirect() {
		$user = Socialite::driver('facebook')->user();

		/*
			check if user not exists
		*/
		$user = User::firstOrCreate([
			'email' => $user->id . '@facebook.com',
		], [
			'name' => $user->name,
			'social' => 1,
			'avatar' => $user->avatar ?? '',
			'password' => Hash::make(Str::random(24)),
		]);
		$user->assignRole('user');
		Auth::login($user, true);
		Flash::success(__('front.registred_user'));
		return redirect('/');
	}
}
