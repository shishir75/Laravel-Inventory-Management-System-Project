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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Admin Group
Route::group(['as'=>'admin.', 'prefix' => 'admin', 'middleware' => 'auth' ], function(){

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('employee', 'EmployeeController');
    Route::resource('customer', 'CustomerController');
    Route::resource('attendance', 'AttendanceController');
    Route::put('attendance/{attendance?}', 'AttendanceController@att_update')->name('attendance.att_update');
    Route::resource('supplier', 'SupplierController');
    Route::resource('advanced_salary', 'AdvancedSalaryController');
    Route::resource('salary', 'SalaryController');
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::resource('expense', 'ExpenseController');
    Route::get('expense-today', 'ExpenseController@today_expense')->name('expense.today');
    Route::get('expense-month/{month?}', 'ExpenseController@month_expense')->name('expense.month');
    Route::get('expense-yearly/{year?}', 'ExpenseController@yearly_expense')->name('expense.yearly');


});
