<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTrackingAPIRequest;
use App\Http\Requests\API\UpdateTrackingAPIRequest;
use App\Models\Tracking;
use App\Repositories\TrackingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TrackingController
 * @package App\Http\Controllers\API
 */

class TrackingAPIController extends AppBaseController
{
    /** @var  TrackingRepository */
    private $trackingRepository;

    public function __construct(TrackingRepository $trackingRepo)
    {
        $this->trackingRepository = $trackingRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/trackings",
     *      summary="Get a listing of the Trackings.",
     *      tags={"Tracking"},
     *      description="Get all Trackings",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Tracking")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->trackingRepository->pushCriteria(new RequestCriteria($request));
        $this->trackingRepository->pushCriteria(new LimitOffsetCriteria($request));
        $trackings = $this->trackingRepository->all()->groupBy('sales_id');

        return $this->sendResponse($trackings->toArray(), 'Trackings retrieved successfully');
    }

    /**
     * @param CreateTrackingAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/trackings",
     *      summary="Store a newly created Tracking in storage",
     *      tags={"Tracking"},
     *      description="Store Tracking",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Tracking that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Tracking")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Tracking"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTrackingAPIRequest $request)
    {
        $input = $request->all();

        $trackings = $this->trackingRepository->create($input);

        return $this->sendResponse($trackings->toArray(), 'Tracking saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/trackings/{id}",
     *      summary="Display the specified Tracking",
     *      tags={"Tracking"},
     *      description="Get Tracking",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Tracking",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Tracking"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Tracking $tracking */
        $tracking = $this->trackingRepository->findWithoutFail($id);

        if (empty($tracking)) {
            return $this->sendError('Tracking not found');
        }

        return $this->sendResponse($tracking->toArray(), 'Tracking retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTrackingAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/trackings/{id}",
     *      summary="Update the specified Tracking in storage",
     *      tags={"Tracking"},
     *      description="Update Tracking",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Tracking",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Tracking that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Tracking")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Tracking"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTrackingAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tracking $tracking */
        $tracking = $this->trackingRepository->findWithoutFail($id);

        if (empty($tracking)) {
            return $this->sendError('Tracking not found');
        }

        $tracking = $this->trackingRepository->update($input, $id);

        return $this->sendResponse($tracking->toArray(), 'Tracking updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/trackings/{id}",
     *      summary="Remove the specified Tracking from storage",
     *      tags={"Tracking"},
     *      description="Delete Tracking",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Tracking",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Tracking $tracking */
        $tracking = $this->trackingRepository->findWithoutFail($id);

        if (empty($tracking)) {
            return $this->sendError('Tracking not found');
        }

        $tracking->delete();

        return $this->sendResponse($id, 'Tracking deleted successfully');
    }
}
