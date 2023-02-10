<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\StoreController;
use App\Http\Controllers\API\CustomerController;

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

// store 
Route::get('/stores', [StoreController::class, 'index']);
Route::get('/store/{name}', [StoreController::class, 'getByName']);
// customer
Route::post('/customer/create', [CustomerController::class, 'create']);
// order
Route::post('/order/create', [OrderController::class, 'create']);