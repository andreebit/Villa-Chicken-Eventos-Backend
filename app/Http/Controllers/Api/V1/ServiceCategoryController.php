<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use App\Services\ServiceCategoryService;

/**
 * Class ServiceCategoryController
 * @package App\Http\Controllers\Api\V1
 */
class ServiceCategoryController extends Controller
{

    /**
     * @param ServiceCategoryService $serviceCategoryService
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ServiceCategoryService $serviceCategoryService) {
        return $this->responseOK($serviceCategoryService->getAll());
    }

}
