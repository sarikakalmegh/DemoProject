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
    return view('admin.login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'UserController@index')->name('home');
Route::resource('ajax-crud-list', 'UserController');
Route::post('ajax-crud-list/store', 'UserController@store');
Route::get('ajax-crud-list/delete/{id}', 'UserController@destroy');
Route::get('ajax-crud-list/active/{id}', 'UserController@active');
Route::get('ajax-crud-list/deactive/{id}', 'UserController@deactive');
Route::get('/list', function () {
    return view('list');
});
Route::post('/checkemail',['uses'=>'UserController@checkEmail']);
Route::get('/users/exportExcel','UserController@exportExcel')->name('exportExcel');
Route::get('/users/exportCSV','UserController@exportCSV')->name('exportCSV');


Route::post('import', 'UserController@import')->name('import');
Route::get('view', 'UserController@view')->name('view');
Route::get('send', 'HomeController@sendNotification');

