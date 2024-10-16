<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('product',ProductController::class);
Route::post('userSignup',[UserController::class,'register']);
Route::post('userLogin',[UserController::class,'login']);
