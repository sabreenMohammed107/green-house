<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
//authinticate routes
Route::middleware('auth:api')->group( function () {
    //item
    Route::get('items', [ItemController::class, 'index']);
    Route::get('single-item/{id}', [ItemController::class, 'singleitem']);
//cart
Route::get('add-to-cart', [CartController::class, 'addItem']);
Route::get('show-cart', [CartController::class, 'index']);
Route::get('add-qty/{id}',  [CartController::class,'AddQuantity']);
Route::get('sub-qty/{id}',  [CartController::class,'SubstractQuantity']);
Route::get('place-order',  [CartController::class,'placeOrder']);
});
