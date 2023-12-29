<?php

namespace App\Modules\Auth\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Auth\DTO;
use App\Modules\Auth\AuthService;
use App\Modules\Auth\Requests\RegisterRequest;
use App\Modules\Auth\Requests\LoginRequest;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $response = $this->authService->register($data);
        return $response;
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $response = $this->authService->login($data);
        return $response;
    }

    public function user(Request $request)
    {
        $user = $request->user();
        $user = DTO::make($user);

        return response()->json($user->__getEntity());
    }

    public function logout()
    {
        $response = $this->authService->logout();
        return $response;
    }
}
