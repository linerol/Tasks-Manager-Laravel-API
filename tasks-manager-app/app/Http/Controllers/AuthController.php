<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\JsonResponse;
// use Illuminate\Support\Facades\Password;

use App\Models\User;
// use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    // use HasApiTokens;
    /**
     * Handle an authentication attempt.
     */
    // public function authenticate(Request $request): RedirectResponse
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('dashboard');
    //     }

    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ])->onlyInput('email');
    // }

    public function register(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        // dd("ok");

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['token' => $token], 201);
    }

    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json(['token' => $token], 200);

            // $token = $user->getRememberToken();
            // return response()->json(['token' => $token], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logout(Request $request)//: JsonResponse
    {
        $user = Auth::user();
        $user->tokens()->delete();

        return response()->json(['message' => 'User logged out successfully'], 200);
        //
    }

    // public function login(Request $request): JsonResponse
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|string',
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $user = Auth::user();
    //         $token = $user->createToken('auth_token')->accessToken;

    //         return response()->json(['token' => $token], 200);
    //     }

    //     return response()->json(['message' => 'Invalid credentials'], 401);
    // }









    // public function forgotPassword(Request $request)
    // {
    //     // Logique d'oubli du mot de passe
    // }

    // public function resetPassword(Request $request)
    // {
    //     // Logique de réinitialisation du mot de passe
    // }

}
