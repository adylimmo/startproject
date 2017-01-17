<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSalesAPIRequest;
use App\Http\Requests\API\UpdateSalesAPIRequest;
use App\Models\Sales;
use App\Repositories\SalesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SalesController
 * @package App\Http\Controllers\API
 */

class SalesAPIController extends AppBaseController
{
    /** @var  SalesRepository */
    private $salesRepository;

    public function __construct(SalesRepository $salesRepo)
    {
        $this->salesRepository = $salesRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/sales",
     *      summary="Get a listing of the Sales.",
     *      tags={"Sales"},
     *      description="Get all Sales",
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
     *                  @SWG\Items(ref="#/definitions/Sales")
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
        $this->salesRepository->pushCriteria(new RequestCriteria($request));
        $this->salesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $sales = $this->salesRepository->all();

        return $this->sendResponse($sales->toArray(), 'Sales retrieved successfully');
    }

    /**
     * @param CreateSalesAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/sales",
     *      summary="Store a newly created Sales in storage",
     *      tags={"Sales"},
     *      description="Store Sales",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Sales that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Sales")
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
     *                  ref="#/definitions/Sales"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSalesAPIRequest $request)
    {
        $input = $request->all();

        $sales = $this->salesRepository->create($input);

        return $this->sendResponse($sales->toArray(), 'Sales saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/sales/{id}",
     *      summary="Display the specified Sales",
     *      tags={"Sales"},
     *      description="Get Sales",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Sales",
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
     *                  ref="#/definitions/Sales"
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
        /** @var Sales $sales */
        $sales = $this->salesRepository->findWithoutFail($id);

        if (empty($sales)) {
            return $this->sendError('Sales not found');
        }

        return $this->sendResponse($sales->toArray(), 'Sales retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSalesAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/sales/{id}",
     *      summary="Update the specified Sales in storage",
     *      tags={"Sales"},
     *      description="Update Sales",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Sales",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Sales that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Sales")
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
     *                  ref="#/definitions/Sales"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSalesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Sales $sales */
        $sales = $this->salesRepository->findWithoutFail($id);

        if (empty($sales)) {
            return $this->sendError('Sales not found');
        }

        $sales = $this->salesRepository->update($input, $id);

        return $this->sendResponse($sales->toArray(), 'Sales updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/sales/{id}",
     *      summary="Remove the specified Sales from storage",
     *      tags={"Sales"},
     *      description="Delete Sales",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Sales",
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
        /** @var Sales $sales */
        $sales = $this->salesRepository->findWithoutFail($id);

        if (empty($sales)) {
            return $this->sendError('Sales not found');
        }

        $sales->delete();

        return $this->sendResponse($id, 'Sales deleted successfully');
    }
}
