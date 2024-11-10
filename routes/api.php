<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\JWTAuthentication;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::resource('product',ProductController::class);
Route::post('userSignup',[UserController::class,'register']);
Route::post('userLogin',[UserController::class,'login']);

Route::middleware(['api', JWTAuthentication::class])->group(function () {
    Route::resource('product',ProductController::class);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    /*Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');*/
    //Route::resource('product',ProductController::class);
});
