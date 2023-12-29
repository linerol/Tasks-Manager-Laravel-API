<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Task::paginate());
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     * @return JsonResponse
     */


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

     public function store(Request $request): JsonResponse
    {
        return response()->json(Task::create($request->all()));
    }

    /**
     * Display the specified resource.
     * @return JsonResponse
     */
    public function show(Task $task): JsonResponse
    {
        return response()->json(Task::findOrFail($task->id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Task $task)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     * @return JsonResponse
     */
    public function update(Request $request, Task $task): JsonResponse
    {
        return response()->json(Task::findOrFail($task->id)->update($request->all()));
    }

    /**
     * Remove the specified resource from storage.
     * @return JsonResponse
     */
    public function destroy(Task $task): JsonResponse
    {
        return response()->json(Task::findOrFail($task->id)->delete());
    }
}
