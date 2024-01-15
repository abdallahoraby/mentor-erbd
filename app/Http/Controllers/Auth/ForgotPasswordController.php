<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Password Reset Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller is responsible for handling password reset emails and
		    | includes a trait which assists in sending these notifications from
		    | your application to your users. Feel free to explore this trait.
		    |
	*/

	use SendsPasswordResetEmails;
	/**
	 * Validate the email for the given request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return void
	 */
	protected function validateEmail(Request $request) {
		$request->validateWithBag('forget', ['email' => 'required|email']);
	}
	/**
	 * Get the response for a failed password reset link.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  string  $response
	 * @return \Illuminate\Http\RedirectResponse
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	protected function sendResetLinkFailedResponse(Request $request, $response) {
		if ($request->wantsJson()) {
			throw ValidationException::withMessages([
				'email' => [trans($response)],
			]);
		}

		return back()
			->withInput($request->only('email'))
			->withErrors(['email' => trans($response)], 'forget');
	}
}
