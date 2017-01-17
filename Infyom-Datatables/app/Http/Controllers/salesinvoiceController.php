<?php

namespace App\Http\Controllers;

use App\DataTables\salesinvoiceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesalesinvoiceRequest;
use App\Http\Requests\UpdatesalesinvoiceRequest;
use App\Repositories\salesinvoiceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class salesinvoiceController extends AppBaseController
{
    /** @var  salesinvoiceRepository */
    private $salesinvoiceRepository;

    public function __construct(salesinvoiceRepository $salesinvoiceRepo)
    {
        $this->salesinvoiceRepository = $salesinvoiceRepo;
    }

    /**
     * Display a listing of the salesinvoice.
     *
     * @param salesinvoiceDataTable $salesinvoiceDataTable
     * @return Response
     */
    public function index(salesinvoiceDataTable $salesinvoiceDataTable)
    {
        return $salesinvoiceDataTable->render('salesinvoices.index');
    }

    /**
     * Show the form for creating a new salesinvoice.
     *
     * @return Response
     */
    public function create()
    {
        return view('salesinvoices.create');
    }

    /**
     * Store a newly created salesinvoice in storage.
     *
     * @param CreatesalesinvoiceRequest $request
     *
     * @return Response
     */
    public function store(CreatesalesinvoiceRequest $request)
    {
        $input = $request->all();

        $salesinvoice = $this->salesinvoiceRepository->create($input);

        Flash::success('Salesinvoice saved successfully.');

        return redirect(route('salesinvoices.index'));
    }

    /**
     * Display the specified salesinvoice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salesinvoice = $this->salesinvoiceRepository->findWithoutFail($id);

        if (empty($salesinvoice)) {
            Flash::error('Salesinvoice not found');

            return redirect(route('salesinvoices.index'));
        }

        return view('salesinvoices.show')->with('salesinvoice', $salesinvoice);
    }

    /**
     * Show the form for editing the specified salesinvoice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salesinvoice = $this->salesinvoiceRepository->findWithoutFail($id);

        if (empty($salesinvoice)) {
            Flash::error('Salesinvoice not found');

            return redirect(route('salesinvoices.index'));
        }

        return view('salesinvoices.edit')->with('salesinvoice', $salesinvoice);
    }

    /**
     * Update the specified salesinvoice in storage.
     *
     * @param  int              $id
     * @param UpdatesalesinvoiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesalesinvoiceRequest $request)
    {
        $salesinvoice = $this->salesinvoiceRepository->findWithoutFail($id);

        if (empty($salesinvoice)) {
            Flash::error('Salesinvoice not found');

            return redirect(route('salesinvoices.index'));
        }

        $salesinvoice = $this->salesinvoiceRepository->update($request->all(), $id);

        Flash::success('Salesinvoice updated successfully.');

        return redirect(route('salesinvoices.index'));
    }

    /**
     * Remove the specified salesinvoice from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salesinvoice = $this->salesinvoiceRepository->findWithoutFail($id);

        if (empty($salesinvoice)) {
            Flash::error('Salesinvoice not found');

            return redirect(route('salesinvoices.index'));
        }

        $this->salesinvoiceRepository->delete($id);

        Flash::success('Salesinvoice deleted successfully.');

        return redirect(route('salesinvoices.index'));
    }
}
