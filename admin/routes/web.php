<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('customers', 'CustomerController');

Route::resource('sales', 'SalesController');

Route::resource('tasks', 'TaskController');

Route::resource('activities', 'ActivityController');

Route::resource('assigments', 'AssigmentController');

Route::resource('reports', 'ReportController');

Route::resource('trackings', 'TrackingController');

Route::resource('confirms', 'ConfirmController');