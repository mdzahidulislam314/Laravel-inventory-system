<?php

use Illuminate\Support\Facades\Route;

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
   return redirect()->route('login');
});

Auth::routes();

Route::group(['prefix'=>'admin','middleware' => ['auth']], function () {

   Route::get('home', 'HomeController@index')->name('home');
   Route::resource('employees', 'EmployeeController');
   Route::resource('customers', 'CustomerController');
   Route::resource('suppliers', 'SupplierController');
   Route::resource('salaries', 'SalaryController');
   Route::resource('adv-salaries', 'AdvsalaryController');
   Route::resource('categories', 'CategoryController');
   Route::resource('products', 'ProductController');
   Route::resource('expenses', 'ExpenseController');
   Route::resource('attendances', 'AttendanceController');

   //Expenses route
   Route::get('today-expenses', 'ExpenseController@todayExp')->name('today.expenses');
   Route::get('monthly-expenses', 'ExpenseController@monthlyExp')->name('monthly.expenses');
   Route::get('yearly-expenses', 'ExpenseController@yearlyExp')->name('yearly.expenses');

   //All month Expenses route
   Route::get('jan-expenses', 'ExpenseController@janExp')->name('jan.expenses');
   Route::get('feb-expenses', 'ExpenseController@febExp')->name('feb.expenses');
   Route::get('aug-expenses', 'ExpenseController@augExp')->name('aug.expenses');

   //Excel import and export route:
   Route::get('import-products', 'ProductController@importProduct')->name('import.products');
   Route::get('export', 'ProductController@export')->name('products.export');
   Route::post('import', 'ProductController@import')->name('products.import');

   //POS(point of sell) route:
   Route::get('pending/orders','PosController@PendingOrder')->name('pending.orders');
   Route::get('view/order/{id}','PosController@viewOrder')->name('show.orders');
   Route::resource('pos', 'PosController');
  

   //cart controller
   Route::post('/add-cart','CartController@index')->name('add.cart');
   Route::post('/cart-update/{rowId}','CartController@catUpdate')->name('cart.update');
   Route::get('/cart-delete/{rowId}','CartController@catDelete')->name('cart.delete');
   Route::post('/create/invoice','CartController@invoice')->name('create.invoice');
   Route::post('/final/invoice','CartController@finalInvoice')->name('final.invoice');
 
});

