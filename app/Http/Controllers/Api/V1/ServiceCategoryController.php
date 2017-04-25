<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use App\Services\ServiceCategoryService;

class ServiceCategoryController extends Controller
{

    public function index(ServiceCategoryService $serviceCategoryService) {
        return $this->responseOK($serviceCategoryService->getAll());
    }

}
