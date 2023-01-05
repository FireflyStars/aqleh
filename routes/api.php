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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/send-reply/{id}', 'ContactController@sendReply')->name('send-reply');
Route::post('/send-request', 'ContactController@sendRequest')->middleware('track.measurementProtocol')->name('send-request');
Route::post('/direct-request', 'ContactController@sendDirectRequest')->middleware('track.measurementProtocol')->name('send-direct-request');

