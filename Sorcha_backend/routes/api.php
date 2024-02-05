<?php

use App\Http\Controllers\api\LaundryController;
use App\Http\Controllers\api\PromoController;
use App\Http\Controllers\api\ShopController;
use App\Http\Controllers\api\UserController as ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/promo', [PromoController::class, 'readAll']);
Route::get('/shop', [ShopController::class, 'readAll']);
Route::get('/laundry', [LaundryController::class, 'readAll']);
Route::get('/user', [App\Http\Controllers\api\UserController::class, 'readAll']);

Route::post('/users', [UserController::class, 'store']);

// Route::post('/register', [App\Http\Controllers\api\UserController::class, 'register']);
// Route::post('/login', [App\Http\Controllers\api\UserController::class, 'login']);

Route::post('register', [App\Http\Controllers\api\UserController::class, 'registerBasicInfo']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('register/laundry-info', [App\Http\Controllers\api\UserController::class, 'registerLaundryInfo']);
});
Route::post('/login', [App\Http\Controllers\api\UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Laundry
    Route::get('/laundry/user/{id}', [LaundryController::class, 'whereUserId']);
    Route::post('/laundry/claim', [LaundryController::class, 'claim']);

    // Promo
    Route::get('/promo/limit', [PromoController::class, 'readLimit']);

    // Shop
    Route::get('/shop/recommendation/limit', [ShopController::class, 'readRecommendationLimit']);
    Route::get('/shop/search/city/{name}', [ShopController::class, 'searchByCity']);


    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/laundries', [LaundryController::class, 'index']);
        Route::get('/laundries/user/{id}', [LaundryController::class, 'show']);
        Route::post('/laundries', [LaundryController::class, 'store']);
        Route::put('/laundries/{id}', [LaundryController::class, 'update']);
        Route::delete('/laundries/{id}', [LaundryController::class, 'destroy']);
    });
});
