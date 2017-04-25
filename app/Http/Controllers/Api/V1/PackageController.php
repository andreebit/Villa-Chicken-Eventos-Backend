<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use App\Http\Controllers\Api\Traits\ControllerTrait;
use App\Http\ValidationRules\V1\Package\CreatePackageRules;
use App\Http\ValidationRules\V1\Package\ListPackageRules;
use App\Http\ValidationRules\V1\Package\PatchPackageRules;
use App\Http\ValidationRules\V1\Package\UpdatePackageRules;
use App\Services\PackageService;
use Illuminate\Http\Request;

/**
 * Class PackageController
 * @package App\Http\Controllers\Api\V1
 */
class PackageController extends Controller
{

    use ControllerTrait;

    /**
     * @param PackageService $packageService
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(PackageService $packageService, Request $request)
    {

        $this->validateParams($request, ListPackageRules::rules());

        $eventTypeId = $request->get('event_type_id', null);
        if (!is_null($eventTypeId)) {
            return $this->responseOK($packageService->getByEventType($eventTypeId));
        } else {
            return $this->responseOK($packageService->getAll());
        }
    }

    /**
     * @param PackageService $packageService
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(PackageService $packageService, $id)
    {
        return $this->responseOK($packageService->getById($id));
    }

    /**
     * @param PackageService $packageService
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function post(PackageService $packageService, Request $request)
    {

        $this->validateRequestJson($request);
        $this->validateParams($request, CreatePackageRules::rules());

        $data = $request->only(['event_type_id', 'name', 'price', 'minimum_pax', 'items']);
        return $this->responseOK($packageService->create($data));
    }

    /**
     * @param PackageService $packageService
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function put(PackageService $packageService, Request $request, $id)
    {

        $this->validateRequestJson($request);
        $this->validateParams($request, UpdatePackageRules::rules());

        $data = $request->only(['event_type_id', 'name', 'price', 'minimum_pax', 'items']);
        return $this->responseOK($packageService->update($id, $data));
    }

    /**
     * @param PackageService $packageService
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function patch(PackageService $packageService, Request $request, $id)
    {
        $this->validateRequestJson($request);
        $this->validateExistParams($request, PatchPackageRules::rules());

        $data = $request->only(['event_type_id', 'name', 'price', 'minimum_pax', 'items']);
        return $this->responseOK($packageService->update($id, $data));
    }

    /**
     * @param PackageService $packageService
     * @param $id
     * @return mixed
     */
    public function delete(PackageService $packageService, $id)
    {
        $packageService->delete($id);
        return $this->responseNoContent();
    }

}
