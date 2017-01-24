<?php

namespace App\Http\Controllers;

use App\DataTables\produkDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateprodukRequest;
use App\Http\Requests\UpdateprodukRequest;
use App\Repositories\produkRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use DB;
use Auth;

class produkController extends AppBaseController
{
    /** @var  produkRepository */
    private $produkRepository;

    public function __construct(produkRepository $produkRepo)
    {
        $this->produkRepository = $produkRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the produk.
     *
     * @param produkDataTable $produkDataTable
     * @return Response
     */
    public function index(produkDataTable $produkDataTable)
    {
        return $produkDataTable->render('produks.index');
    }

    /**
     * Show the form for creating a new produk.
     *
     * @return Response
     */
    public function create()
    {
        $customer = DB::table('customers')
            ->where('status', 'active')
            ->select('id','customerName')
            ->get();

        return view('produks.create', compact('customer'));
    }

    /**
     * Store a newly created produk in storage.
     *
     * @param CreateprodukRequest $request
     *
     * @return Response
     */
    public function store(CreateprodukRequest $request)
    {
        $input = $request->all();

        $produk = $this->produkRepository->create($input);

        Flash::success('Produk tersimpan.');

        return redirect(route('produks.index'));
    }

    /**
     * Display the specified produk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            Flash::error('Produk tidak ditemukan');

            return redirect(route('produks.index'));
        }

        return view('produks.show')->with('produk', $produk);
    }

    /**
     * Show the form for editing the specified produk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            Flash::error('Produk tidak ditemukan');

            return redirect(route('produks.index'));
        }

        $customer = DB::table('sales_prices')
            ->leftJoin('customers', 'customers.id', '=', 'sales_prices.customerID')
            ->where('sales_prices.productID', $id)
            ->select('customers.customerName','sales_prices.*')
            ->get();

        return view('produks.edit', compact('id', 'produk', 'customer'));
    }

    /**
     * Update the specified produk in storage.
     *
     * @param  int              $id
     * @param UpdateprodukRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateprodukRequest $request)
    {
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            Flash::error('Produk tidak ditemukan');

            return redirect(route('produks.index'));
        }

        $produk = $this->produkRepository->update($request->all(), $id);

        Flash::success('Produk berhasil diubah.');

        return redirect(route('produks.index'));
    }

    /**
     * Remove the specified produk from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            Flash::error('Produk tidak ditemukan');

            return redirect(route('produks.index'));
        }

        $this->produkRepository->delete($id);

        Flash::success('Produk berhasil dihapus.');

        return redirect(route('produks.index'));
    }
}
