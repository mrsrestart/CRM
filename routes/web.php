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

Route::get('/', 'App\Http\Controllers\mainController@index');
Route::post('/loginCheck', 'App\Http\Controllers\mainController@loginAuth');



//Route::get('/createUser', 'mainController@createUser');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

//customers
Route::get('/showAllCustomer', 'App\Http\Controllers\customerController@index');
Route::get('/addNewCustomer', 'App\Http\Controllers\customerController@addNewCustomer');
Route::post('/createCustomer', 'App\Http\Controllers\customerController@createCustomer');
Route::get('/deleteCustomer/{id}', 'App\Http\Controllers\customerController@deleteCustomer');
Route::get('/editCustomer/{id}', 'App\Http\Controllers\customerController@showEditCustomer');
Route::post('/editCustomerUp/{id}', 'App\Http\Controllers\customerController@editCustomer');
Route::post('/addCustomerCourse', 'App\Http\Controllers\customerController@addCustomerCourse');
Route::get('/editCustomerCourse/{id}', 'App\Http\Controllers\customerController@editCustomerCourseView');
Route::post('/editCustomerCourse/{id}', 'App\Http\Controllers\customerController@editCustomerCourse');



//course
Route::get('/createCourse', 'App\Http\Controllers\customerController@showCource');
Route::post('/createCourse', 'App\Http\Controllers\customerController@createCource');


//Books
Route::get('/showAllBook', 'App\Http\Controllers\bookController@index');
Route::get('/addNewBook', 'App\Http\Controllers\bookController@showAddNewBook');
Route::post('/addNewBook', 'App\Http\Controllers\bookController@addNewBook');
Route::get('/editBook/{id}', 'App\Http\Controllers\bookController@showEditBook');
Route::post('/editBook/{id}', 'App\Http\Controllers\bookController@editBook');
Route::get('/deleteBook/{id}', 'App\Http\Controllers\bookController@deleteBook');

//Course
Route::get('/showAllCourse', 'App\Http\Controllers\courseController@index');
Route::get('/addNewCourse', 'App\Http\Controllers\courseController@showAddNewCourse');
Route::post('/addNewCourse', 'App\Http\Controllers\courseController@addNewCourse');
Route::get('/editCourse/{id}', 'App\Http\Controllers\courseController@showEditCourse');
Route::post('/editCourse/{id}', 'App\Http\Controllers\courseController@editCourse');
Route::get('/deleteCourse/{id}', 'App\Http\Controllers\courseController@deleteCourse');

//search
Route::get('/search' , 'App\Http\Controllers\searchController@index');




//report
Route::get('/report','App\Http\Controllers\reportController@index');
Route::get('/reportAllCustomer','App\Http\Controllers\reportController@reportAllCustomer');
Route::get('/reportCourseShow','App\Http\Controllers\reportController@reportCourseShow');
Route::post('/reportCourseRegister','App\Http\Controllers\reportController@reportCourseRegister');
Route::get('/reportBookBuy','App\Http\Controllers\reportController@reportBookBuy');
Route::post('/reportBookBuy','App\Http\Controllers\reportController@reportBookBuyEx');
