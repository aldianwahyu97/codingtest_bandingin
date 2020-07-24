<?php

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
Route::get('/deleteBook/{id_book}','Library@deleteBookAct');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
