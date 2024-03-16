<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CSController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SalesDetailsController;
use Illuminate\Support\Facades\Route;

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


Route::group(['middleware'=>'guest'],function ()
{
    Route::get('/bong/login',[AuthController::class,'index'])->name('login');
    Route::post('/bong/login',[AuthController::class,'loginpost'])->name('login');
});

Route::group(['middleware'=>'auth'],function ()
{
    Route::get('dashboard',[DashController::class, 'index'])->name('dashboard');
    Route::post('logout',[AuthController::class, 'logout'])->name('logout');

    Route::resource('/user',CSController::class);
    Route::resource('/product',ProductController::class);
    Route::resource('/client',ClientController::class);
    Route::resource('/sales',SaleController::class);


    Route::get('sales_detail',[SalesDetailsController::class, 'index'])->name('sales_detail');
    Route::post('sales_detail',[SaleController::class, 'add_product'])->name('add_product');
    Route::delete('sales_detail/{id}',[SaleController::class, 'cancel'])->name('cancel');
    Route::post('sales_detail',[SaleController::class, 'finish'])->name('finish');

});
