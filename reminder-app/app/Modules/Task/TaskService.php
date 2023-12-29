<?php

namespace App\Modules\Task;

use App\Modules\Task\Repositories\TaskRepositoryInterface;
use App\Modules\Task\Models\Task;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;


class TaskService
{
    protected readonly TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index()
    {
        $tasks = $this->taskRepository->all();
        return $tasks;
    }

    public function store(array $data)
    {
        $task = $this->taskRepository->make($data);
        $task = Task::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => $data['status'],
        ]);
        return response()->json($task);
    }


    public function show(Task $task)
    {
        $task = Task::findOrFail($task->id);
        return response()->json($task);
    }

    public function update(array $data, Task $task)
    {
        $task = Task::findOrFail($task->id);
        $task = $task->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => $data['status'],
        ]);
        return response()->json($task);
    }

    public function destroy(Task $task)
    {
        $task = Task::findOrFail($task->id)->delete();
        return response()->json($task);
    }
}
