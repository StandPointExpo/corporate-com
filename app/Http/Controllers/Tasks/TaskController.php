<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;

use App\Repositories\Tasks\TaskRepository;
use App\Http\Traits\Statusable;

class TaskController extends Controller
{
    use Statusable;

    private $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function getParameterValues()
    {
        return $this->success($this->repository->getParameterValues());
    }

    public function index()
    {
        $task = $this->repository->getInstanceWithRelations();

        return view('tasks', compact('task'));
    }

    /**
     * @param TaskRequest $request
     * @return array
     */
    public function store(TaskRequest $request)
    {
        try {
            $this->repository->storeTask(collect($request->validated()));

            return $this->success();
        } catch (\Throwable $exception) { return $this->fail($exception); }
    }
}
