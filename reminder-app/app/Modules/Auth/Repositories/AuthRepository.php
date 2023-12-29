<?php

namespace App\Modules\Auth\Repositories;

use App\BaseRepository\Eloquent\EloquentRepository;
use App\Models\User;
use App\Modules\Auth\Repositories\AuthRepositoryInterface;

class AuthRepository extends EloquentRepository implements AuthRepositoryInterface
{
    protected $authModel;

    public function __construct(User $authModel)
    {
        parent::__construct($authModel);
    }
}
