<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTrackingRequest;
use App\Http\Requests\UpdateTrackingRequest;
use App\Repositories\TrackingRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\SalesRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TrackingController extends AppBaseController
{
    /** @var  TrackingRepository */
    private $trackingRepository;

    public function __construct(TrackingRepository $trackingRepo)
    {
        $this->trackingRepository = $trackingRepo;
    }

    /**
     * Display a listing of the Tracking.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->trackingRepository->pushCriteria(new RequestCriteria($request));
        $trackings = $this->trackingRepository->with('sales')->all();

        return view('trackings.index')
            ->with('trackings', $trackings);
    }

    /**
     * Show the form for creating a new Tracking.
     *
     * @return Response
     */
    public function create(SalesRepository $salesRepository)
    {
        foreach ($salesRepository->all() as $item) {
            $sales[$item->sales_id] = $item->sales_name;
        }
    
        return view('trackings.create')
                    ->with('sales', $sales);
    }

    /**
     * Store a newly created Tracking in storage.
     *
     * @param CreateTrackingRequest $request
     *
     * @return Response
     */
    public function store(CreateTrackingRequest $request)
    {
        $input = $request->all();

        $tracking = $this->trackingRepository->create($input);

        Flash::success('Tracking saved successfully.');

        return redirect(route('trackings.index'));
    }

    /**
     * Display the specified Tracking.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tracking = $this->trackingRepository->findWithoutFail($id);

        if (empty($tracking)) {
            Flash::error('Tracking not found');

            return redirect(route('trackings.index'));
        }

        return view('trackings.show')->with('tracking', $tracking);
    }

    /**
     * Show the form for editing the specified Tracking.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(SalesRepository $salesRepository, $id)
    {
        $tracking = $this->trackingRepository->findWithoutFail($id);

        if (empty($tracking)) {
            Flash::error('Tracking not found');

            return redirect(route('trackings.index'));
        }

        foreach ($salesRepository->all() as $item) {
            $sales[$item->sales_id] = $item->sales_name;
        }

        return view('trackings.edit')->with([
            'tracking' => $tracking,
            'sales' => $sales
        ]);
    }

    /**
     * Update the specified Tracking in storage.
     *
     * @param  int              $id
     * @param UpdateTrackingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTrackingRequest $request)
    {
        $tracking = $this->trackingRepository->findWithoutFail($id);

        if (empty($tracking)) {
            Flash::error('Tracking not found');

            return redirect(route('trackings.index'));
        }

        $tracking = $this->trackingRepository->update($request->all(), $id);

        Flash::success('Tracking updated successfully.');

        return redirect(route('trackings.index'));
    }

    /**
     * Remove the specified Tracking from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tracking = $this->trackingRepository->findWithoutFail($id);

        if (empty($tracking)) {
            Flash::error('Tracking not found');

            return redirect(route('trackings.index'));
        }

        $this->trackingRepository->delete($id);

        Flash::success('Tracking deleted successfully.');

        return redirect(route('trackings.index'));
    }
}
