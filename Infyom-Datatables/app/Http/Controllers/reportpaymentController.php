<?php

namespace App\Http\Controllers;

use App\DataTables\reportpaymentDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatereportpaymentRequest;
use App\Http\Requests\UpdatereportpaymentRequest;
use App\Repositories\reportpaymentRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class reportpaymentController extends AppBaseController
{
    /** @var  reportpaymentRepository */
    private $reportpaymentRepository;

    public function __construct(reportpaymentRepository $reportpaymentRepo)
    {
        $this->reportpaymentRepository = $reportpaymentRepo;
    }

    /**
     * Display a listing of the reportpayment.
     *
     * @param reportpaymentDataTable $reportpaymentDataTable
     * @return Response
     */
    public function index(reportpaymentDataTable $reportpaymentDataTable)
    {
        return $reportpaymentDataTable->render('reportpayments.index');
    }

    /**
     * Show the form for creating a new reportpayment.
     *
     * @return Response
     */
    public function create()
    {
        return view('reportpayments.create');
    }

    /**
     * Store a newly created reportpayment in storage.
     *
     * @param CreatereportpaymentRequest $request
     *
     * @return Response
     */
    public function store(CreatereportpaymentRequest $request)
    {
        $input = $request->all();

        $reportpayment = $this->reportpaymentRepository->create($input);

        Flash::success('Reportpayment saved successfully.');

        return redirect(route('reportpayments.index'));
    }

    /**
     * Display the specified reportpayment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reportpayment = $this->reportpaymentRepository->findWithoutFail($id);

        if (empty($reportpayment)) {
            Flash::error('Reportpayment not found');

            return redirect(route('reportpayments.index'));
        }

        return view('reportpayments.show')->with('reportpayment', $reportpayment);
    }

    /**
     * Show the form for editing the specified reportpayment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reportpayment = $this->reportpaymentRepository->findWithoutFail($id);

        if (empty($reportpayment)) {
            Flash::error('Reportpayment not found');

            return redirect(route('reportpayments.index'));
        }

        return view('reportpayments.edit')->with('reportpayment', $reportpayment);
    }

    /**
     * Update the specified reportpayment in storage.
     *
     * @param  int              $id
     * @param UpdatereportpaymentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatereportpaymentRequest $request)
    {
        $reportpayment = $this->reportpaymentRepository->findWithoutFail($id);

        if (empty($reportpayment)) {
            Flash::error('Reportpayment not found');

            return redirect(route('reportpayments.index'));
        }

        $reportpayment = $this->reportpaymentRepository->update($request->all(), $id);

        Flash::success('Reportpayment updated successfully.');

        return redirect(route('reportpayments.index'));
    }

    /**
     * Remove the specified reportpayment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reportpayment = $this->reportpaymentRepository->findWithoutFail($id);

        if (empty($reportpayment)) {
            Flash::error('Reportpayment not found');

            return redirect(route('reportpayments.index'));
        }

        $this->reportpaymentRepository->delete($id);

        Flash::success('Reportpayment deleted successfully.');

        return redirect(route('reportpayments.index'));
    }
}
