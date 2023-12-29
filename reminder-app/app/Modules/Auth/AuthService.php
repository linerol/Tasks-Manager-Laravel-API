<?php

namespace App\Modules\Auth;

use App\Modules\Auth\Repositories\AuthRepositoryInterface;
use App\Modules\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;


class AuthService
{
    protected readonly AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(array $data)
    {
        $user = $this->authRepository->make($data);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        if ($user->save()) {
            $accessToken = $user->createToken('access_token');
            return response()->json([
                'message' => 'Successfully created user!',
                'access_token' => $accessToken->plainTextToken
            ], 200);
        }
        return response()->json(['error'=>'Provide proper details'], 400);
    }

    public function login(array $data)
    {
        $user = $this->authRepository->make($data);
        $credentials = [
            'email' => $data['email'], 
            'password' => $data['password']
        ];

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('access_token')->plainTextToken;
        return response()->json(['access_token' => $token, 'token_type' => 'Bearer'], 200);
    }

    public function logout() {
        $user = Auth::user();
        $user->tokens()->delete();
        return response()->json(['message' => 'Successfully logged out'], 200);
    }

}
