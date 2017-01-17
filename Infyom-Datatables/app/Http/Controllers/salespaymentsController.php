<?php

namespace App\Http\Controllers;

use App\DataTables\salespaymentsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesalespaymentsRequest;
use App\Http\Requests\UpdatesalespaymentsRequest;
use App\Repositories\salespaymentsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class salespaymentsController extends AppBaseController
{
    /** @var  salespaymentsRepository */
    private $salespaymentsRepository;

    public function __construct(salespaymentsRepository $salespaymentsRepo)
    {
        $this->salespaymentsRepository = $salespaymentsRepo;
    }

    /**
     * Display a listing of the salespayments.
     *
     * @param salespaymentsDataTable $salespaymentsDataTable
     * @return Response
     */
    public function index(salespaymentsDataTable $salespaymentsDataTable)
    {
        return $salespaymentsDataTable->render('salespayments.index');
    }

    /**
     * Show the form for creating a new salespayments.
     *
     * @return Response
     */
    public function create()
    {
        return view('salespayments.create');
    }

    /**
     * Store a newly created salespayments in storage.
     *
     * @param CreatesalespaymentsRequest $request
     *
     * @return Response
     */
    public function store(CreatesalespaymentsRequest $request)
    {
        $input = $request->all();

        $salespayments = $this->salespaymentsRepository->create($input);

        Flash::success('Salespayments saved successfully.');

        return redirect(route('salespayments.index'));
    }

    /**
     * Display the specified salespayments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salespayments = $this->salespaymentsRepository->findWithoutFail($id);

        if (empty($salespayments)) {
            Flash::error('Salespayments not found');

            return redirect(route('salespayments.index'));
        }

        return view('salespayments.show')->with('salespayments', $salespayments);
    }

    /**
     * Show the form for editing the specified salespayments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salespayments = $this->salespaymentsRepository->findWithoutFail($id);

        if (empty($salespayments)) {
            Flash::error('Salespayments not found');

            return redirect(route('salespayments.index'));
        }

        return view('salespayments.edit')->with('salespayments', $salespayments);
    }

    /**
     * Update the specified salespayments in storage.
     *
     * @param  int              $id
     * @param UpdatesalespaymentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesalespaymentsRequest $request)
    {
        $salespayments = $this->salespaymentsRepository->findWithoutFail($id);

        if (empty($salespayments)) {
            Flash::error('Salespayments not found');

            return redirect(route('salespayments.index'));
        }

        $salespayments = $this->salespaymentsRepository->update($request->all(), $id);

        Flash::success('Salespayments updated successfully.');

        return redirect(route('salespayments.index'));
    }

    /**
     * Remove the specified salespayments from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salespayments = $this->salespaymentsRepository->findWithoutFail($id);

        if (empty($salespayments)) {
            Flash::error('Salespayments not found');

            return redirect(route('salespayments.index'));
        }

        $this->salespaymentsRepository->delete($id);

        Flash::success('Salespayments deleted successfully.');

        return redirect(route('salespayments.index'));
    }
}
