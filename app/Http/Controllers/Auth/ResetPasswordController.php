<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Password Reset Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller is responsible for handling password reset requests
		    | and uses a simple trait to include this behavior. You're free to
		    | explore this trait and override any methods you wish to tweak.
		    |
	*/

	use ResetsPasswords;

	/**
	 * Where to redirect users after resetting their password.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Get the response for a failed password reset.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  string  $response
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
	 */
	protected function sendResetFailedResponse(Request $request, $response) {
		if ($request->wantsJson()) {
			throw ValidationException::withMessages([
				'email' => [trans($response)],
			]);
		}

		return redirect()->back()
			->withInput($request->only('email'))
			->withErrors(['email' => trans($response)], 'forget');
	}
}
