<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', 'App\Http\Controllers\HelloController@index');

Route::get('/promo', 'App\Http\Controllers\PromoController@index')->middleware('soap');

Route::put('/promo', 'App\Http\Controllers\PromoController@index')->middleware('soap');

Route::get('/prizes', 'App\Http\Controllers\PrizeController@index');

Route::get('/player', 'App\Http\Controllers\PlayerController@index')->middleware('token');

Route::post('/create_player', 'App\Http\Controllers\PlayerController@create');