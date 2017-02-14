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

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


//client api
Route::get('/clients/testClient','ClientsController@isClientExist');
Route::resource('/clients','ClientsController',['middleware' => 'cors']);


//orders api
Route::get('/orders/getClientOrders','OrderController@getClientOrders');
Route::resource('/orders','OrderController',['middleware' => 'cors']);
Route::post('/orders/ChangeStutes','OrderController@update',['middleware' => 'cors']);

//Rattingd

Route::resource('/ratings','RatingsController',['middleware' => 'cors']);
