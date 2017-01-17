<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateConfirmAPIRequest;
use App\Http\Requests\API\UpdateConfirmAPIRequest;
use App\Models\Confirm;
use App\Repositories\ConfirmRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ConfirmController
 * @package App\Http\Controllers\API
 */

class ConfirmAPIController extends AppBaseController
{
    /** @var  ConfirmRepository */
    private $confirmRepository;

    public function __construct(ConfirmRepository $confirmRepo)
    {
        $this->confirmRepository = $confirmRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/confirms",
     *      summary="Get a listing of the Confirms.",
     *      tags={"Confirm"},
     *      description="Get all Confirms",
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
     *                  @SWG\Items(ref="#/definitions/Confirm")
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
        $this->confirmRepository->pushCriteria(new RequestCriteria($request));
        $this->confirmRepository->pushCriteria(new LimitOffsetCriteria($request));
        $confirms = $this->confirmRepository->all();

        return $this->sendResponse($confirms->toArray(), 'Confirms retrieved successfully');
    }

    /**
     * @param CreateConfirmAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/confirms",
     *      summary="Store a newly created Confirm in storage",
     *      tags={"Confirm"},
     *      description="Store Confirm",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Confirm that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Confirm")
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
     *                  ref="#/definitions/Confirm"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateConfirmAPIRequest $request)
    {
        $input = $request->all();

        $confirms = $this->confirmRepository->create($input);

        return $this->sendResponse($confirms->toArray(), 'Confirm saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/confirms/{id}",
     *      summary="Display the specified Confirm",
     *      tags={"Confirm"},
     *      description="Get Confirm",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Confirm",
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
     *                  ref="#/definitions/Confirm"
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
        /** @var Confirm $confirm */
        $confirm = $this->confirmRepository->findWithoutFail($id);

        if (empty($confirm)) {
            return $this->sendError('Confirm not found');
        }

        return $this->sendResponse($confirm->toArray(), 'Confirm retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateConfirmAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/confirms/{id}",
     *      summary="Update the specified Confirm in storage",
     *      tags={"Confirm"},
     *      description="Update Confirm",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Confirm",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Confirm that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Confirm")
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
     *                  ref="#/definitions/Confirm"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateConfirmAPIRequest $request)
    {
        $input = $request->all();

        /** @var Confirm $confirm */
        $confirm = $this->confirmRepository->findWithoutFail($id);

        if (empty($confirm)) {
            return $this->sendError('Confirm not found');
        }

        $confirm = $this->confirmRepository->update($input, $id);

        return $this->sendResponse($confirm->toArray(), 'Confirm updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/confirms/{id}",
     *      summary="Remove the specified Confirm from storage",
     *      tags={"Confirm"},
     *      description="Delete Confirm",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Confirm",
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
        /** @var Confirm $confirm */
        $confirm = $this->confirmRepository->findWithoutFail($id);

        if (empty($confirm)) {
            return $this->sendError('Confirm not found');
        }

        $confirm->delete();

        return $this->sendResponse($id, 'Confirm deleted successfully');
    }
}
