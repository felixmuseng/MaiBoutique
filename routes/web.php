<?php

use App\Http\Controllers\NavController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [NavController::class,'GetWelcomePage']);
Route::get('/login', [NavController::class, 'GetLoginPage'])->name('login');
Route::get('/register',[NavController::class, 'GetRegisterPage'] );

Route::post('/login', [UserController::class, 'LoginUser']);
Route::post('/register', [UserController::class, 'RegisterUser']);

Route::middleware(['auth'])->group(function(){
    Route::get('/logout', [UserController::class, 'LogoutUser']);

    Route::get('/home',[NavController::class, 'GetHomePage']);
    Route::get('/product/{productId}', [NavController::class, 'GetProductPage']);
    Route::get('/profile', [NavController::class, 'GetProfilePage']);
    Route::get('/search', [NavController::class, 'GetSearchPage']);
    Route::get('/updatePass', [NavController::class, 'GetUpdatePassPage']);

    Route::post('/updatePass', [UserController::class, 'updatePassword']);
});

Route::middleware(['role.member'])->group(function(){
    Route::get('/cart', [NavController::class, 'GetCartPage']);
    Route::get('/history', [NavController::class, 'GetHistoryPage']);
    Route::get('/updateProfile', [NavController::class, 'GetUpdateProfilePage']);

    Route::post('/cartAdd/{productId}', [TransactionController::class, 'cartAdd']);
    Route::post('/cartDelete/{productId}', [TransactionController::class, 'cartDelete']);
    Route::post('/cartCheckOut', [TransactionController::class, 'cartCheckOut']);
    Route::post('/updateProfile', [UserController::class, 'updateProfile']);
});

Route::middleware(['role.admin'])->group(function(){
    Route::get('/addProduct', [NavController::class, 'GetAddProductPage']);

    Route::post('/addProduct', [ProductController::class, 'addProduct']);
});
