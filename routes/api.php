<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'reqres'], function () use ($router) {
    Route::post('/sum/process', 'SumController@process')->name('sum.process');
    Route::post('/multiply/process', 'MultiplyController@process')->name('multiply.process');
    Route::post('/prime-number/process', 'PrimeNumberController@process')->name('prime-number.process');
    Route::post('/fibonacci/process', 'FibonacciController@process')->name('fibonacci.process');
});