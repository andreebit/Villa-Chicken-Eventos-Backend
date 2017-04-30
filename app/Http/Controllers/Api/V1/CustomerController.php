<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use App\Services\CustomerService;
use App\Services\EventTypeService;

/**
 * Class CustomerController
 * @package App\Http\Controllers\Api\V1
 */
class CustomerController extends Controller
{

    /**
     * @param CustomerService $customerService
     * @param $type
     * @param $number
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByDocument(CustomerService $customerService, $type, $number) {
        return $this->responseOK($customerService->getByDocument($type, $number));
    }
}
