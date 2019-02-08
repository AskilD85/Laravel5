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

//Route::get('/', function () {
//    return view('page');
//});

Route::get('/','IndexController@index');
Auth::routes();

Route::get('new/{id} ','IndexController@show')->name('NewShow');
//Route::post('new/{id} ','IndexController@update')->name('newUpdate');
Route::get('new-add','IndexController@add')->name('AddNewGet');
Route::post('new-add','IndexController@add')->name('AddNewPost');

Route::get('/uploads/{id}','IndexController@downloadFile')->name('DownloadFile');

Route::post('news/add','IndexController@store')->name('articleStore');
Route::get('news','IndexController@news');


Route::get('new/edit/{new}','IndexController@edit')->name('newEdit');
Route::post('new/edit/{new}','IndexController@edit')->name('newEditPost');


Route::get('news/delete/{new}','IndexController@delete')->name('newDelete');





