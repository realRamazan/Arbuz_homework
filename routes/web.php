<?php

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

Route::get('/', 'App\Http\Controllers\StorageController@index');
Route::get('/create', 'App\Http\Controllers\StorageController@create');
Route::get('/order', 'App\Http\Controllers\OrderController@index')->name('order.index');
Route::post('/order/create', 'App\Http\Controllers\OrderController@create')->name('order.create');


