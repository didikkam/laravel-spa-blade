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
//     return view('template');
// });

Route::group(['prefix'=>'page','as'=>'page.'], function(){
    Route::get('/home', 'HelloControllers@home')->name('home');
    Route::get('/about', 'HelloControllers@about')->name('about');
});

Route::view('/{path?}', 'template');
