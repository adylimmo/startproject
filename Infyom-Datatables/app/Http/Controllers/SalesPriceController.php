<?php

namespace App\Http\Controllers;

use App\DataTables\SalesPriceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSalesPriceRequest;
use App\Http\Requests\UpdateSalesPriceRequest;
use App\Repositories\SalesPriceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SalesPriceController extends AppBaseController
{
    /** @var  SalesPriceRepository */
    private $salesPriceRepository;

    public function __construct(SalesPriceRepository $salesPriceRepo)
    {
        $this->salesPriceRepository = $salesPriceRepo;
    }

    /**
     * Display a listing of the SalesPrice.
     *
     * @param SalesPriceDataTable $salesPriceDataTable
     * @return Response
     */
    public function index(SalesPriceDataTable $salesPriceDataTable)
    {
        return $salesPriceDataTable->render('sales_prices.index');
    }

    /**
     * Show the form for creating a new SalesPrice.
     *
     * @return Response
     */
    public function create()
    {
        return view('sales_prices.create');
    }

    /**
     * Store a newly created SalesPrice in storage.
     *
     * @param CreateSalesPriceRequest $request
     *
     * @return Response
     */
    public function store(CreateSalesPriceRequest $request)
    {
        $input = $request->all();

        $salesPrice = $this->salesPriceRepository->create($input);

        Flash::success('Sales Price saved successfully.');

        return redirect(route('salesPrices.index'));
    }

    /**
     * Display the specified SalesPrice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salesPrice = $this->salesPriceRepository->findWithoutFail($id);

        if (empty($salesPrice)) {
            Flash::error('Sales Price not found');

            return redirect(route('salesPrices.index'));
        }

        return view('sales_prices.show')->with('salesPrice', $salesPrice);
    }

    /**
     * Show the form for editing the specified SalesPrice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salesPrice = $this->salesPriceRepository->findWithoutFail($id);

        if (empty($salesPrice)) {
            Flash::error('Sales Price not found');

            return redirect(route('salesPrices.index'));
        }

        return view('sales_prices.edit')->with('salesPrice', $salesPrice);
    }

    /**
     * Update the specified SalesPrice in storage.
     *
     * @param  int              $id
     * @param UpdateSalesPriceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSalesPriceRequest $request)
    {
        $salesPrice = $this->salesPriceRepository->findWithoutFail($id);

        if (empty($salesPrice)) {
            Flash::error('Sales Price not found');

            return redirect(route('salesPrices.index'));
        }

        $salesPrice = $this->salesPriceRepository->update($request->all(), $id);

        Flash::success('Sales Price updated successfully.');

        return redirect(route('salesPrices.index'));
    }

    /**
     * Remove the specified SalesPrice from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salesPrice = $this->salesPriceRepository->findWithoutFail($id);

        if (empty($salesPrice)) {
            Flash::error('Sales Price not found');

            return redirect(route('salesPrices.index'));
        }

        $this->salesPriceRepository->delete($id);

        Flash::success('Sales Price deleted successfully.');

        return redirect(route('salesPrices.index'));
    }
}
