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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('home');
   });
});

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

/* Route for displaying the home page with the client table data */
Route::get('/home', 'HomeController@index')->name('home');

/* Route for inserting new client */
Route::post('/insert', 'InsertController@insertNewClient')->name('store');

/* Route for displaying the client insert form */
Route::get('/insert', 'InsertController@index')->name('insert');

/* Route for updaing the selected client */
Route::post('/update', 'ClientController@update')->name('update');
Route::post('/updateClient', 'ClientController@updateClient')->name('updateClient');

/* Route for displaying the client insert form */
Route::get('/update', 'InsertController@index')->name('update');

/* Route when no file is specified, go to the home page with the client table data */
Route::post('/', 'HomeController@index')->name('home');