<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use App\Http\Controllers\Api\Traits\ControllerTrait;
use App\Http\ValidationRules\V1\Quotation\CreateQuotationRules;
use App\Http\ValidationRules\V1\Quotation\PatchQuotationRules;
use App\Http\ValidationRules\V1\Quotation\UpdateQuotationRules;
use App\Services\QuotationService;
use Illuminate\Http\Request;

/**
 * Class QuotationController
 * @package App\Http\Controllers\Api\V1
 */
class QuotationController extends Controller
{

    use ControllerTrait;

    /**
     * @param QuotationService $quotationService
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(QuotationService $quotationService, Request $request)
    {
        return $this->responseOK($quotationService->getAll());
    }

    /**
     * @param QuotationService $quotationService
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(QuotationService $quotationService, $id)
    {
        return $this->responseOK($quotationService->getById($id));
    }

    /**
     * @param QuotationService $quotationService
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function post(QuotationService $quotationService, Request $request)
    {

        $this->validateRequestJson($request);
        $this->validateParams($request, CreateQuotationRules::rules());

        $data = $request->only(['event_type_id', 'customer_id', 'lounge_id', 'date_event', 'time_event', 'description', 'items']);
        return $this->responseOK($quotationService->create($data));
    }

    /**
     * @param QuotationService $quotationService
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function put(QuotationService $quotationService, Request $request, $id)
    {

        $this->validateRequestJson($request);
        $this->validateParams($request, UpdateQuotationRules::rules());

        $data = $request->only(['event_type_id', 'customer_id', 'lounge_id', 'date_event', 'time_event', 'description', 'items']);
        return $this->responseOK($quotationService->update($id, $data));
    }

    /**
     * @param QuotationService $quotationService
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function patch(QuotationService $quotationService, Request $request, $id)
    {
        $this->validateRequestJson($request);
        $this->validateExistParams($request, PatchQuotationRules::rules());

        $data = $request->only(['event_type_id', 'customer_id', 'lounge_id', 'date_event', 'time_event', 'description', 'items']);
        return $this->responseOK($quotationService->update($id, $data));
    }

    /**
     * @param QuotationService $quotationService
     * @param $id
     * @return mixed
     */
    public function delete(QuotationService $quotationService, $id)
    {
        $quotationService->delete($id);
        return $this->responseNoContent();
    }

}
