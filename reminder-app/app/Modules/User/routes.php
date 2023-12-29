<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Modules\User\Controllers\UserController;


Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('me', [UserController::class, 'show']);
});
