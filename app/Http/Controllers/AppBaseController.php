<?php

namespace App\Http\Controllers;

use App\Traits\Authorizable;
use InfyOm\Generator\Utils\ResponseUtil;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
use Response;

class AppBaseController extends Controller {
   use Authorizable;
	public function sendResponse($result, $message) {
		return Response::json(ResponseUtil::makeResponse($message, $result));
	}

	public function sendError($error, $code = 404) {
		return Response::json(ResponseUtil::makeError($error), $code);
	}

	public function sendSuccess($message) {
		return Response::json([
			'success' => true,
			'message' => $message,
		], 200);
	}

    public function array_get(array $getAbilities, $method)
    {
    }
}
