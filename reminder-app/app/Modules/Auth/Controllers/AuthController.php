<?php

namespace App\Modules\Auth\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Modules\Auth\DTO;
use App\Modules\Auth\AuthService;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string',
            'c_password' => 'required|same:password',
        ]);
        $response = $this->authService->register($data);
        return response()->json($response);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $response = $this->authService->login($data);
        return $response;
    }

    public function user(Request $request)
    {
        // $user = $this->findOrFail($request->id);
        // return response()->json($user);
        $user = $request->user();
        $user = DTO::make($user);

        return response()->json($user->__getEntity());
        // return view('user.index', compact('user'));

    }

    public function logout(Request $request)
    {
        $response = $this->authService->logout();
        return $response;
    }
}
