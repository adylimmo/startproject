<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesalesinvoiceAPIRequest;
use App\Http\Requests\API\UpdatesalesinvoiceAPIRequest;
use App\Models\salesinvoice;
use App\Repositories\salesinvoiceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class salesinvoiceController
 * @package App\Http\Controllers\API
 */

class salesinvoiceAPIController extends AppBaseController
{
    /** @var  salesinvoiceRepository */
    private $salesinvoiceRepository;

    public function __construct(salesinvoiceRepository $salesinvoiceRepo)
    {
        $this->salesinvoiceRepository = $salesinvoiceRepo;
    }

    /**
     * Display a listing of the salesinvoice.
     * GET|HEAD /salesinvoices
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->salesinvoiceRepository->pushCriteria(new RequestCriteria($request));
        $this->salesinvoiceRepository->pushCriteria(new LimitOffsetCriteria($request));
        $salesinvoices = $this->salesinvoiceRepository->all();

        return $this->sendResponse($salesinvoices->toArray(), 'Salesinvoices retrieved successfully');
    }

    /**
     * Store a newly created salesinvoice in storage.
     * POST /salesinvoices
     *
     * @param CreatesalesinvoiceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatesalesinvoiceAPIRequest $request)
    {
        $input = $request->all();

        $salesinvoices = $this->salesinvoiceRepository->create($input);

        return $this->sendResponse($salesinvoices->toArray(), 'Salesinvoice saved successfully');
    }

    /**
     * Display the specified salesinvoice.
     * GET|HEAD /salesinvoices/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var salesinvoice $salesinvoice */
        $salesinvoice = $this->salesinvoiceRepository->findWithoutFail($id);

        if (empty($salesinvoice)) {
            return $this->sendError('Salesinvoice not found');
        }

        return $this->sendResponse($salesinvoice->toArray(), 'Salesinvoice retrieved successfully');
    }

    /**
     * Update the specified salesinvoice in storage.
     * PUT/PATCH /salesinvoices/{id}
     *
     * @param  int $id
     * @param UpdatesalesinvoiceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesalesinvoiceAPIRequest $request)
    {
        $input = $request->all();

        /** @var salesinvoice $salesinvoice */
        $salesinvoice = $this->salesinvoiceRepository->findWithoutFail($id);

        if (empty($salesinvoice)) {
            return $this->sendError('Salesinvoice not found');
        }

        $salesinvoice = $this->salesinvoiceRepository->update($input, $id);

        return $this->sendResponse($salesinvoice->toArray(), 'salesinvoice updated successfully');
    }

    /**
     * Remove the specified salesinvoice from storage.
     * DELETE /salesinvoices/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var salesinvoice $salesinvoice */
        $salesinvoice = $this->salesinvoiceRepository->findWithoutFail($id);

        if (empty($salesinvoice)) {
            return $this->sendError('Salesinvoice not found');
        }

        $salesinvoice->delete();

        return $this->sendResponse($id, 'Salesinvoice deleted successfully');
    }
}
