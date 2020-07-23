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

Route::get('/','AuthController@Login')->name('loginpage');
Route::post('/loginact','AuthController@LoginAct');
Route::get('/logoutact','AuthController@LogoutAct');
Route::get('/index','Library@getLibrary')->middleware('auth');
Route::post('/editLibrary','Library@editLibrary');
Route::post('/addLibrary','Library@addLibrary');
Route::get('/booklist/{id_lib}','Library@getBook')->middleware('auth');
Route::post('/addBook','Library@addBook');
Route::post('/editBook','Library@editBook');
Route::post('/deleteBook','Library@deleteBook');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
