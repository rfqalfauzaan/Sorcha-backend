<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaundryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home');
});
//user

Route::get('user',[UserController::class,'user'])->name('user');

Route::get('tambahuser',[UserController::class,'tambahuser'])->name('tambahuser');
// tambahuser
Route::post('insertuser',[UserController::class,'insertuser'])->name('insertuser');
//edit
Route::get('tampiluser/{id}', [UserController::class, 'tampiluser'])->name('tampiluser');
Route::post('updateuser/{id}', [UserController::class, 'updateuser'])->name('updateuser');


//shop

Route::get('/shop', [ShopController::class, 'index'])->name('shop');

Route::get('/tambahshop', [ShopController::class, 'tambahshop'])->name('tambahshop');
Route::post('/insertshop', [ShopController::class, 'insertshop'])->name('insertshop');

Route::get('tampilshop/{id}', [ShopController::class, 'tampilshop'])->name('tampilshop');
Route::post('updateshop/{id}', [ShopController::class, 'updateshop'])->name('updateshop');

//laundry

Route::get('/laundry', [LaundryController::class, 'index'])->name('laundry');

Route::get('/tambahlaundry', [LaundryController::class, 'tambahlaundry'])->name('tambahlaundry');
Route::post('/insertlaundry', [LaundryController::class, 'insertslaundry'])->name('insertlaundry');

Route::get('tampillaundry/{id}', [LaundryController::class, 'tampillaundry'])->name('tampillaundry');
Route::post('updatelaundry/{id}', [LaundryController::class, 'updatelaundry'])->name('updatelaundry');
