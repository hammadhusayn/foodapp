<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\DrinksController;
use App\Http\Controllers\ToppingController;
use App\Http\Controllers\SearchController;
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
Route::post('/menu/create', [MenuController::class, 'store']);
Route::post('/menu/edit', [MenuController::class, 'edit']);
Route::post('/menu/update', [MenuController::class, 'update']);
Route::post('/menu/delete', [MenuController::class, 'destroy']);
Route::post('/product/create', [ProductController::class, 'store']);
Route::post('/product/edit', [ProductController::class, 'edit']);
Route::post('/product/update', [ProductController::class, 'update']);
Route::post('/product/delete', [ProductController::class, 'destroy']);

Route::post('/size/create', [SizeController::class, 'store']);
Route::post('/size/edit', [SizeController::class, 'edit']);
Route::post('/size/update', [SizeController::class, 'update']);
Route::post('/size/delete', [SizeController::class, 'destroy']);

Route::post('/drinks/create', [DrinksController::class, 'store']);
Route::post('/drinks/edit', [DrinksController::class, 'edit']);
Route::post('/drinks/update', [DrinksController::class, 'update']);
Route::post('/drinks/delete', [DrinksController::class, 'destroy']);

Route::post('/topping/create', [ToppingController::class, 'store']);
Route::post('/topping/edit', [ToppingController::class, 'edit']);
Route::post('/topping/update', [ToppingController::class, 'update']);
Route::post('/topping/delete', [ToppingController::class, 'destroy']);

Route::post('/forget-password', [ForgetPasswordController::class, 'verify_email']);
Route::post('/forget-password/verify', [ForgetPasswordController::class, 'verify_otp']);
Route::post('/forget-password/update', [ToppingController::class, 'store']);

Route::post('/search', [SearchController::class, 'search']);