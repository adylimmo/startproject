<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAssigmentAPIRequest;
use App\Http\Requests\API\UpdateAssigmentAPIRequest;
use App\Models\Assigment;
use App\Repositories\AssigmentRepository;
use App\Repositories\SalesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AssigmentController
 * @package App\Http\Controllers\API
 */

class AssigmentAPIController extends AppBaseController
{
    /** @var  AssigmentRepository */
    private $assigmentRepository;

    public function __construct(AssigmentRepository $assigmentRepo)
    {
        $this->assigmentRepository = $assigmentRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/assigments",
     *      summary="Get a listing of the Assigments.",
     *      tags={"Assigment"},
     *      description="Get all Assigments",
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
     *                  @SWG\Items(ref="#/definitions/Assigment")
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
        $this->assigmentRepository->pushCriteria(new RequestCriteria($request));
        $this->assigmentRepository->pushCriteria(new LimitOffsetCriteria($request));
        $assigments = $this->assigmentRepository->with('sales')->with('customer')->with('task')->all()->groupBy('sales_id');

        return $this->sendResponse($assigments->toArray(), 'Assigments retrieved successfully');
    }

    /**
     * @param CreateAssigmentAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/assigments",
     *      summary="Store a newly created Assigment in storage",
     *      tags={"Assigment"},
     *      description="Store Assigment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Assigment that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Assigment")
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
     *                  ref="#/definitions/Assigment"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAssigmentAPIRequest $request)
    {
        $input = $request->all();

        $assigments = $this->assigmentRepository->create($input);

        return $this->sendResponse($assigments->toArray(), 'Assigment saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/assigments/{id}",
     *      summary="Display the specified Assigment",
     *      tags={"Assigment"},
     *      description="Get Assigment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Assigment",
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
     *                  ref="#/definitions/Assigment"
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
        /** @var Assigment $assigment */
        $assigment = $this->assigmentRepository->findWithoutFail($id);

        if (empty($assigment)) {
            return $this->sendError('Assigment not found');
        }

        return $this->sendResponse($assigment->toArray(), 'Assigment retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateAssigmentAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/assigments/{id}",
     *      summary="Update the specified Assigment in storage",
     *      tags={"Assigment"},
     *      description="Update Assigment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Assigment",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Assigment that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Assigment")
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
     *                  ref="#/definitions/Assigment"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAssigmentAPIRequest $request)
    {
        $input = $request->all();

        /** @var Assigment $assigment */
        $assigment = $this->assigmentRepository->findWithoutFail($id);

        if (empty($assigment)) {
            return $this->sendError('Assigment not found');
        }

        $assigment = $this->assigmentRepository->update($input, $id);

        return $this->sendResponse($assigment->toArray(), 'Assigment updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/assigments/{id}",
     *      summary="Remove the specified Assigment from storage",
     *      tags={"Assigment"},
     *      description="Delete Assigment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Assigment",
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
        /** @var Assigment $assigment */
        $assigment = $this->assigmentRepository->findWithoutFail($id);

        if (empty($assigment)) {
            return $this->sendError('Assigment not found');
        }

        $assigment->delete();

        return $this->sendResponse($id, 'Assigment deleted successfully');
    }

    public function salesAssignment(SalesRepository $salesRepository, $id)
    {
        $sales = $salesRepository->findWithoutFail($id);

        if (empty($sales)) {
            return $this->sendError('Assigment not found');
        }

        $assigments = $this->assigmentRepository->with('sales')->with('customer')->with('task')->findWhere(['sales_id' => $id])->all();

        return $this->sendResponse($assigments, 'Assigments retrieved successfully');
    }
}
