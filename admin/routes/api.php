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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::resource('customers', 'CustomerAPIController');

Route::resource('sales', 'SalesAPIController');

Route::resource('tasks', 'TaskAPIController');

Route::resource('activities', 'ActivityAPIController');

Route::resource('assigments', 'AssigmentAPIController');

Route::resource('reports', 'ReportAPIController');

Route::resource('trackings', 'TrackingAPIController');

Route::resource('confirms', 'ConfirmAPIController');


Route::get('assigments/sales/{id}', 'AssigmentAPIController@salesAssignment');