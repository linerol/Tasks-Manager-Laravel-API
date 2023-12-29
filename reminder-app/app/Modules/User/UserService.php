<?php

namespace App\Modules\User;

use App\Modules\Auth\Repositories\AuthRepositoryInterface;
use App\Modules\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use App\Modules\Auth\DTO;

class UserService
{
    protected readonly AuthRepositoryInterface $userRepository;

    public function __construct(AuthRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function me()
    {
        $user = Auth::user();
        $user = DTO::make($user);
        return response()->json($user->__getEntity());
    }
}