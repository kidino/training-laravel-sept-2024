<?php

use App\Models\Role;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/roles', function (Request $request) {
    return Role::all();
})->middleware('auth:sanctum');

Route::get('/projects', function (Request $request) {
    return Project::paginate(10);
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
