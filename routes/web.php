<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;
use Illuminate\Types\Relations\Role;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ProductsController::class)->prefix('products')->name('products.')->group(function ()
{
    Route::get('/products', 'main')->name('products');
    Route::get('/create', 'form')->name('form');
    Route::post('/create', 'create')->name('create');
    Route::get('/show/{id}','show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/edit/{id}', 'update')->name('update');
    Route::delete('/products/{id}', 'delete')->name('delete');
});

Route::controller(OrdersController::class)->prefix('orders')->name('orders.')->group(function()
{
    Route::get('/orders', 'main')->name('orders');
    Route::get('/create', 'form')->name('form');
    Route::post('/create', 'create')->name('create');
    Route::get('/show/{id}', 'show')->name('show');
    Route::put('/show/{id}', 'update')->name('update');
});
