<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/welcomes', function () {
//     return "
//     <h1>Hi</h1>
    
    
//     hi";
// });

// Route::get('/admin/{name}','postController@index');

// Route::get('/contact/{name}','postController@contact');

// Route::get('/orders',function(){
//     return view('orders');
// });


// Route::get('/offers','OffersController@index');



  

// Route::resource('/offers','OffersController');
Auth::routes();

// Route::get('/home', 'HomeController@index');

Route::get('ordersReportsView',array(  'middleware' => ['auth'],'as'=>'ordersReportsView','uses'=>'OrderController@ordersReport'));
Route::get('ordersreports',array(  'middleware' => ['auth'],'as'=>'reports','uses'=>'OrderController@reports'));

// Route::resource('/orders',array( 'middleware' => ['auth'],'uses'=>'OrderController'));


// Route::resource('/ratings','RatingsController');
// Route::get('/clients/testClient','ClientsController@isClientExist');
$router->group(['middleware' => 'auth'], function($router)
{
   $router->get('/', 'OrderController@index');

  // $router->get('/ordersreports', 'OrderController@reports');
  $router->resource('/orders', 'OrderController');
  
});
$router->group(['middleware' => 'auth'], function($router)
{
  $router->resource('/ratings', 'RatingsController');
});

$router->group(['middleware' => 'auth'], function($router)
{
  $router->resource('/offers', 'OffersController');
});