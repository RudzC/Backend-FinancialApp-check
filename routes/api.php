<?php

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

//eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9yZWdpc3RlciIsImlhdCI6MTU4NjI0MzQzMSwiZXhwIjoxNTg2MjQ3MDMxLCJuYmYiOjE1ODYyNDM0MzEsImp0aSI6ImFjZWNINlBaR0tYRXEyWTEiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.soFxc9Z753ZIzOYcZ_iYCR4AHLBzb5RlhG522os8om8

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
 

Route::group(['middleware' => ['jwt.verify']], function() {

Route::get('/trades', 'TradeController@index');
Route::get('/trade/{id}', 'TradeController@show');
Route::post('/trade/{id}', 'TradeController@update');
Route::post('/trade', 'TradeController@store');
Route::delete('/trade/{id}', 'TradeController@destroy');

Route::get('/currencies', 'CurrencyController@index');
Route::get('/currency/{id}', 'CurrencyController@show');
Route::post('/currency/{id}', 'CurrencyController@update');
Route::post('/currency', 'CurrencyController@store');
Route::delete('/currency/{id}', 'CurrencyController@destroy');

Route::get('/transactions', 'TransactionController@index')->name('transactions.all');
Route::post('/transactions', 'TransactionController@store')->name('transactions.store');
Route::get('/transactions/{transaction}', 'TransactionController@show')->name('transactions.show');
Route::put('/transactions/{transaction}', 'TransactionController@update')->name('transactions.update');
Route::delete('/transactions/{transaction}', 'TransactionController@destroy')->name('transactions.destroy');

Route::get('/categories', 'CategoryController@index')->name('categories.all');
Route::post('/categories', 'CategoryController@store')->name('categories.store');
Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');
Route::put('/categories/{category}', 'CategoryController@update')->name('categories.update');
Route::delete('/categories/{category}', 'CategoryController@destroy')->name('categories.destroy');

Route::post('/logout', 'AuthController@logout');
}); 
