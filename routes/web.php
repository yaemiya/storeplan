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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('reserve/index', "ReserveController@index")->name('r.index');
Route::get('reserve/create', "ReserveController@create")->name('r.create');
Route::post('reserve/confirm', "ReserveController@confirm")->name('r.confirm');
Route::get('reserve/store', "ReserveController@store")->name('r.store');
Route::get('reserve/reserved', "ReserveController@reserved")->name('r.reserved');


Route::get('admin/calendar', "AdminController@index")->name('a.cal');
Route::get('admin/edit/{date}', 'AdminController@edit')->name('a.edit');
Route::get('admin/edit', 'AdminController@updateOrCreate')->name('a.uc');
Route::get('admin/delete/{id}', 'AdminController@delete')->name('a.delete');
