<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAssigmentRequest;
use App\Http\Requests\UpdateAssigmentRequest;
use App\Repositories\AssigmentRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CustomerRepository;
use App\Repositories\SalesRepository;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AssigmentController extends AppBaseController
{
    /** @var  AssigmentRepository */
    private $assigmentRepository;

    public function __construct(AssigmentRepository $assigmentRepo)
    {
        $this->assigmentRepository = $assigmentRepo;
    }

    /**
     * Display a listing of the Assigment.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->assigmentRepository->pushCriteria(new RequestCriteria($request));
        $assigments = $this->assigmentRepository->with('sales')->with('customer')->with('task')->all();

        //dd($assigments->toArray());
        //exit();

        return view('assigments.index')
            ->with('assigments', $assigments);
    }

    /**
     * Show the form for creating a new Assigment.
     *
     * @return Response
     */
    public function create(SalesRepository $salesRepository, CustomerRepository $customerRepository, TaskRepository $taskRepository)
    {
        foreach ($salesRepository->all() as $item) {
            $sales[$item->sales_id] = $item->sales_name;
        }

        foreach ($customerRepository->all() as $item) {
            $customers[$item->customer_id] = $item->customer_name;
        }

        foreach ($taskRepository->all() as $item) {
            $tasks[$item->task_id] = $item->task_title;
        }

        return view('assigments.create')
            ->with([
                'sales' => $sales,
                'customers' => $customers,
                'tasks' => $tasks
            ]);
    }

    /**
     * Store a newly created Assigment in storage.
     *
     * @param CreateAssigmentRequest $request
     *
     * @return Response
     */
    public function store(CreateAssigmentRequest $request)
    {
        $input = $request->all();

        $assigment = $this->assigmentRepository->create($input);

        Flash::success('Assigment saved successfully.');

        return redirect(route('assigments.index'));
    }

    /**
     * Display the specified Assigment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $assigment = $this->assigmentRepository->findWithoutFail($id);

        if (empty($assigment)) {
            Flash::error('Assigment not found');

            return redirect(route('assigments.index'));
        }

        return view('assigments.show')->with('assigment', $assigment);
    }

    /**
     * Show the form for editing the specified Assigment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(SalesRepository $salesRepository, CustomerRepository $customerRepository, TaskRepository $taskRepository, $id)
    {
        $assigment = $this->assigmentRepository->findWithoutFail($id);

        if (empty($assigment)) {
            Flash::error('Assigment not found');

            return redirect(route('assigments.index'));
        }

        foreach ($salesRepository->all() as $item) {
            $sales[$item->sales_id] = $item->sales_name;
        }

        foreach ($customerRepository->all() as $item) {
            $customers[$item->customer_id] = $item->customer_name;
        }

        foreach ($taskRepository->all() as $item) {
            $tasks[$item->task_id] = $item->task_title;
        }

        return view('assigments.edit')->with([
            'sales' => $sales,
            'customers' => $customers,
            'tasks' => $tasks,
            'assigment' => $assigment
        ]);
    }

    /**
     * Update the specified Assigment in storage.
     *
     * @param  int              $id
     * @param UpdateAssigmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAssigmentRequest $request)
    {
        $assigment = $this->assigmentRepository->findWithoutFail($id);

        if (empty($assigment)) {
            Flash::error('Assigment not found');

            return redirect(route('assigments.index'));
        }

        $assigment = $this->assigmentRepository->update($request->all(), $id);

        Flash::success('Assigment updated successfully.');

        return redirect(route('assigments.index'));
    }

    /**
     * Remove the specified Assigment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $assigment = $this->assigmentRepository->findWithoutFail($id);

        if (empty($assigment)) {
            Flash::error('Assigment not found');

            return redirect(route('assigments.index'));
        }

        $this->assigmentRepository->delete($id);

        Flash::success('Assigment deleted successfully.');

        return redirect(route('assigments.index'));
    }
}
