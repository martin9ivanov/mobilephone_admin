<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/os/add', 'OSController@add');

Route::get('/os/deactivate/{os}', 'OSController@deactivate');

Route::post('/os/submit', 'BrandsController@store');

Route::get('/brands/add', 'BrandsController@add');

Route::get('/brands/deactivate/{brands}', 'BrandsController@deactivate');

Route::post('/brands/submit', 'BrandsController@store');

Route::get('/products/add', 'ProductsController@add');

Route::get('/products/deactivate/{products}', 'ProductsController@deactivate');

Route::post('/products/submit', 'ProductsController@store');

Route::get('/products/view/{products}', 'ProductsController@view');

Route::controller('datatables', 'DatatablesController', [
    'anyData'  => 'datatables.data',
    'getIndex' => 'datatables',
]);

Route::controller('users', 'UsersController', [
    'anyData'  => 'users.data',
    'getIndex' => 'users',
]);

Route::controller('logs', 'LogsController', [
    'anyData'  => 'logs.data',
    'getIndex' => 'logs',
]);

Route::controller('products', 'ProductsController', [
    'anyData'  => 'products.data',
    'getIndex' => 'products',
]);

Route::controller('brands', 'BrandsController', [
    'anyData'  => 'brands.data',
    'getIndex' => 'brands',
]);

Route::controller('os', 'OSController', [
    'anyData'  => 'os.data',
    'getIndex' => 'os',
]);
