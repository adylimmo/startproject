<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConfirmRequest;
use App\Http\Requests\UpdateConfirmRequest;
use App\Repositories\ConfirmRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ConfirmController extends AppBaseController
{
    /** @var  ConfirmRepository */
    private $confirmRepository;

    public function __construct(ConfirmRepository $confirmRepo)
    {
        $this->confirmRepository = $confirmRepo;
    }

    /**
     * Display a listing of the Confirm.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->confirmRepository->pushCriteria(new RequestCriteria($request));
        $confirms = $this->confirmRepository->all();

        return view('confirms.index')
            ->with('confirms', $confirms);
    }

    /**
     * Show the form for creating a new Confirm.
     *
     * @return Response
     */
    public function create()
    {
        return view('confirms.create');
    }

    /**
     * Store a newly created Confirm in storage.
     *
     * @param CreateConfirmRequest $request
     *
     * @return Response
     */
    public function store(CreateConfirmRequest $request)
    {
        $input = $request->all();

        $confirm = $this->confirmRepository->create($input);

        Flash::success('Confirm saved successfully.');

        return redirect(route('confirms.index'));
    }

    /**
     * Display the specified Confirm.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $confirm = $this->confirmRepository->findWithoutFail($id);

        if (empty($confirm)) {
            Flash::error('Confirm not found');

            return redirect(route('confirms.index'));
        }

        return view('confirms.show')->with('confirm', $confirm);
    }

    /**
     * Show the form for editing the specified Confirm.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $confirm = $this->confirmRepository->findWithoutFail($id);

        if (empty($confirm)) {
            Flash::error('Confirm not found');

            return redirect(route('confirms.index'));
        }

        return view('confirms.edit')->with('confirm', $confirm);
    }

    /**
     * Update the specified Confirm in storage.
     *
     * @param  int              $id
     * @param UpdateConfirmRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConfirmRequest $request)
    {
        $confirm = $this->confirmRepository->findWithoutFail($id);

        if (empty($confirm)) {
            Flash::error('Confirm not found');

            return redirect(route('confirms.index'));
        }

        $confirm = $this->confirmRepository->update($request->all(), $id);

        Flash::success('Confirm updated successfully.');

        return redirect(route('confirms.index'));
    }

    /**
     * Remove the specified Confirm from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $confirm = $this->confirmRepository->findWithoutFail($id);

        if (empty($confirm)) {
            Flash::error('Confirm not found');

            return redirect(route('confirms.index'));
        }

        $this->confirmRepository->delete($id);

        Flash::success('Confirm deleted successfully.');

        return redirect(route('confirms.index'));
    }
}
