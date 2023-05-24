<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::post('/register', [registerController::class, 'Register']);
Route::post('/register', [AdminController::class, 'Register']);
Route::post('/login', [AdminController::class, 'login']);
Route::get('/vendor', [VendorController::class, 'index']);
Route::post('/vendor/create', [VendorController::class, 'store']);
Route::post('/vendor/edit', [VendorController::class, 'edit']);
Route::post('/vendor/update', [VendorController::class, 'update']);
Route::post('/vendor/delete', [VendorController::class, 'destroy']);
