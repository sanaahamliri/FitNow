<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgressController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('progress',[ProgressController::class, 'index']);
Route::post('progress',[ProgressController::class, 'store']);
Route::put('progress/edit/{id}',[ProgressController::class, 'edit']);
Route::delete('progress/delete/{id}',[ProgressController::class, 'delete']);






Route::post('register', [UserController::class, 'createUser']);
Route::post('login', [UserController::class, 'loginUser']);