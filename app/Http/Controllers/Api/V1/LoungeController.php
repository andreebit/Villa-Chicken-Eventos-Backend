<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use App\Services\CustomerService;
use App\Services\EventTypeService;
use App\Services\LoungeService;

/**
 * Class LoungeController
 * @package App\Http\Controllers\Api\V1
 */
class LoungeController extends Controller
{

    /**
     * @param LoungeService $loungeService
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByLocal(LoungeService $loungeService, $id) {
        return $this->responseOK($loungeService->getByLocal($id));
    }
}
