<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller as BaseController;

abstract class Controller extends BaseController
{

    /**
     * @param $response
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseOK($response)
    {
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * @return mixed
     */
    protected function responseNoContent()
    {
        return response()->json('', Response::HTTP_NO_CONTENT);
    }

}
