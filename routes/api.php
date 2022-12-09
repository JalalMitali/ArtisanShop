<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
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
// routes/api.php
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);


Route::get('/user', function (Request $request) {
    return $request->user;
})->middleware('auth:sanctum');

Route::post('/purchase', function (Request $request) {
    $stripeCharge = $request->user()->charge(
        100, $request->paymentMethodId
    );
})->middleware('auth:sanctum');

Route::post('/pay', function (Request $request) {
    if (!$request->user()) {
        return json_encode($request->user());
    }
    $payment = $request->user()->pay(
        1400
    );

    return $payment->client_secret;
})->middleware('auth:sanctum');

Route::get('/products', [ProductsController::class, 'getAll']);
Route::get('/products/{id}', [ProductsController::class, 'findOneByID']);

Route::post('/products', [ProductsController::class, 'addOne']);

Route::put('/products/{id}', [ProductsController::class, 'updateOneByID']);

Route::delete('/products/{id}', [ProductsController::class, 'deleteOneByID']);
