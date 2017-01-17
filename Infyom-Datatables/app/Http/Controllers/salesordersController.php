<?php

namespace App\Http\Controllers;

use App\DataTables\salesordersDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesalesordersRequest;
use App\Http\Requests\UpdatesalesordersRequest;
use App\Repositories\salesordersRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class salesordersController extends AppBaseController
{
    /** @var  salesordersRepository */
    private $salesordersRepository;

    public function __construct(salesordersRepository $salesordersRepo)
    {
        $this->salesordersRepository = $salesordersRepo;
    }

    /**
     * Display a listing of the salesorders.
     *
     * @param salesordersDataTable $salesordersDataTable
     * @return Response
     */
    public function index(salesordersDataTable $salesordersDataTable)
    {
        return $salesordersDataTable->render('salesorders.index');
    }

    /**
     * Show the form for creating a new salesorders.
     *
     * @return Response
     */
    public function create()
    {
        return view('salesorders.create');
    }


    /**
     * Store a newly created salesorders in storage.
     *
     * @param CreatesalesordersRequest $request
     *
     * @return Response
     */
    public function store(CreatesalesordersRequest $request)
    {
        $input = $request->all();

        $salesorders = $this->salesordersRepository->create($input);

        Flash::success('Salesorders saved successfully.');

        return redirect(route('salesorders.index'));
    }

    /**
     * Display the specified salesorders.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salesorders = $this->salesordersRepository->findWithoutFail($id);

        if (empty($salesorders)) {
            Flash::error('Salesorders not found');

            return redirect(route('salesorders.index'));
        }

        return view('salesorders.show')->with('salesorders', $salesorders);
    }

    /**
     * Show the form for editing the specified salesorders.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salesorders = $this->salesordersRepository->findWithoutFail($id);

        if (empty($salesorders)) {
            Flash::error('Salesorders not found');

            return redirect(route('salesorders.index'));
        }

        return view('salesorders.edit')->with('salesorders', $salesorders);
    }

    /**
     * Update the specified salesorders in storage.
     *
     * @param  int              $id
     * @param UpdatesalesordersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesalesordersRequest $request)
    {
        $salesorders = $this->salesordersRepository->findWithoutFail($id);

        if (empty($salesorders)) {
            Flash::error('Salesorders not found');

            return redirect(route('salesorders.index'));
        }

        $salesorders = $this->salesordersRepository->update($request->all(), $id);

        Flash::success('Salesorders updated successfully.');

        return redirect(route('salesorders.index'));
    }

    /**
     * Remove the specified salesorders from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salesorders = $this->salesordersRepository->findWithoutFail($id);

        if (empty($salesorders)) {
            Flash::error('Salesorders not found');

            return redirect(route('salesorders.index'));
        }

        $this->salesordersRepository->delete($id);

        Flash::success('Salesorders deleted successfully.');

        return redirect(route('salesorders.index'));
    }
}
