<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{
    public function show($id)
    {
        // display a specific task
        $task = Task::findOrFail($id);
        return response()->json($task);
    }

    public function index()
    {
        // display all tasks
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        // create new task
        $task = Task::create($request->all());
        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        // update an existing task
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return response()->json($task);
    }

    public function destroy($id)
    {
        // delete a specific task
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(null, 204);
    }
}
