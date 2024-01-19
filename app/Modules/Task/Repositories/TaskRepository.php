<?php

namespace App\Modules\Task\Repositories;

use App\BaseRepository\Eloquent\EloquentRepository;
use App\Modules\Task\Models\Task;
use App\Modules\Task\Repositories\TaskRepositoryInterface;

class TaskRepository extends EloquentRepository implements TaskRepositoryInterface
{
    public function __construct(Task $taskModel)
    {
        parent::__construct($taskModel);
    }
}