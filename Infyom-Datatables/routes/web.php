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
Route::group(['middleware' => ['auth']], function () {
    Route::resource('companies', 'companyController');
});
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::resource('stockProducts', 'stock_productsController');
Route::resource('receives', 'receivesController');
Route::resource('purchasePrices', 'purchase_priceController');
Route::resource('salesPrices', 'SalesPriceController');
Route::resource('salesorderitems', 'salesorderitemController');
Route::resource('salespayments', 'salespaymentsController');
Route::get('/ajax-payment', 'salespaymentsController@ajaxGetNumber');

Route::resource('customers', 'customersController');
Route::resource('factories', 'factoriesController');
Route::resource('salesorders', 'salesordersController');
Route::get('/ajax-sales-order', 'salesordersController@ajaxGetNumber');
Route::resource('suppliers', 'suppliersController');
/*
|--------------------------------------------------------------------------
| Ajax Customer, Product Here
|--------------------------------------------------------------------------
|
*/
Route::get('/ajax-customer', 'ajaxMasterController@ajaxcustomer');
Route::get('/ajax-product', 'ajaxMasterController@ajaxproduct');
/*
|--------------------------------------------------------------------------
| Example Print,
|--------------------------------------------------------------------------
|
*/
Route::get('PrintBuktiPembayaran', 'PrintController@PrintBuktiPembayaran');
Route::get('PrintSalesInvoice', 'PrintController@PrintSalesInvoice');
Route::get('PrintSalesOrder', 'PrintController@PrintSalesOrder');
/*
|--------------------------------------------------------------------------
| Example Print,
|--------------------------------------------------------------------------
|
*/
Route::resource('salesinvoices', 'salesinvoicesController');
Route::resource('produks', 'produkController');