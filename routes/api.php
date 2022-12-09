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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductsController::class, 'getAll']);
Route::get('/products/{id}', [ProductsController::class, 'findOneByID']);

Route::post('/products', [ProductsController::class, 'addOne']);

Route::put('/products/{id}', [ProductsController::class, 'updateOneByID']);

Route::delete('/products/{id}', [ProductsController::class, 'deleteOneByID']);
