<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use App\Services\CustomerService;
use App\Services\EventTypeService;
use App\Services\MaterialService;

/**
 * Class MaterialController
 * @package App\Http\Controllers\Api\V1
 */
class MaterialController extends Controller
{

    /**
     * @param MaterialService $materialService
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByEventType(MaterialService $materialService, $id) {
        return $this->responseOK($materialService->getByEventType($id));
    }
}
