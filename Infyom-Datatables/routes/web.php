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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');







Route::resource('products', 'productController');



Route::resource('stockProducts', 'stock_productsController');

Route::resource('receives', 'receivesController');





Route::resource('companies', 'companyController');









Route::resource('purchasePrices', 'purchase_priceController');

Route::resource('salesPrices', 'SalesPriceController');

Route::resource('salesorderitems', 'salesorderitemController');

Route::resource('salespayments', 'salespaymentsController');

Route::resource('customers', 'customersController');



Route::resource('factories', 'factoriesController');

Route::resource('products', 'productsController');
Route::resource('salesorders', 'salesordersController');

Route::resource('suppliers', 'suppliersController');

Route::resource('salesinvoices', 'salesinvoiceController');
/*
|--------------------------------------------------------------------------
| Ajax Customer, Product Here
|--------------------------------------------------------------------------
|
*/
Route::get('/ajax-cuxtomer', 'ajaxMasterController@ajaxcustomer');
Route::get('/ajax-product', 'ajaxMasterController@ajaxproduct');