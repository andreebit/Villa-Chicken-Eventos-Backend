<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use App\Services\EventTypeService;

/**
 * Class EventTypeController
 * @package App\Http\Controllers\Api\V1
 */
class EventTypeController extends Controller
{
    /**
     * @param EventTypeService $eventTypeService
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(EventTypeService $eventTypeService) {
        return $this->responseOK($eventTypeService->getAll());
    }
}
