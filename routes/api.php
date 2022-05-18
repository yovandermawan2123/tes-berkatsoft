<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesOrderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductController::class, 'index']);
Route::delete('/products/{product:id}', [ProductController::class, 'destroy']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products', [ProductController::class, 'update']);
Route::get('/products/{id}', [ProductController::class, 'edit']);

Route::get('/customers', [CustomerController::class, 'index']);
Route::delete('/customers/{customers:id}', [CustomerController::class, 'destroy']);
Route::post('/customers', [CustomerController::class, 'store']);
Route::put('/customers', [CustomerController::class, 'update']);
Route::get('/customers/{id}', [CustomerController::class, 'edit']);

Route::get('/salesorders', [SalesOrderController::class, 'index']);
Route::delete('/salesorders/{salesorder:id}', [SalesOrderController::class, 'destroy']);
Route::post('/salesorders', [SalesOrderController::class, 'store']);
Route::put('/salesorders', [SalesOrderController::class, 'update']);
Route::get('/salesorders/{id}', [SalesOrderController::class, 'edit']);

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/register', [RegisterController::class, 'store']);