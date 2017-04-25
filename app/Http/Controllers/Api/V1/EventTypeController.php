<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use App\Services\EventTypeService;

class EventTypeController extends Controller
{
    public function index(EventTypeService $eventTypeService) {
        return $this->responseOK($eventTypeService->getAll());
    }
}
