<?php

namespace App\Modules\Task\Controllers;

use App\Modules\Task\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Task\TaskService;
use App\Modules\Task\Requests\StoreRequest;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index()
    {
        $tasks = $this->taskService->index();
        return response()->json($tasks);
    }

    /**
     * store method
     *
     * This method is used to store a new task in the database. 
     * She accept a http request which contains data about the new task and return a JSON response which contains the task created.
     *
     * @param  Request  $request  The HTTP request which contains data about the new task.
     * @return JsonResponse A JSON response containing the new task.
     *
     *
     */

     public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $response = $this->taskService->store($data);

        return $response;
    }

    /**
     * Display the specified resource.
     * @return JsonResponse
     */
    public function show(Task $task)
    {
        $response = $this->taskService->show($task);
        return $response;
    }

    /**
     * Update the specified resource in storage.
     * @return JsonResponse
     */
    public function update(StoreRequest $request, Task $task)
    {
        $data = $request->validated();
        $response = $this->taskService->update($data, $task);
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     * @return JsonResponse
     */
    public function destroy(Task $task)
    {
        $response = $this->taskService->destroy($task);
        return $response;
    }
}
