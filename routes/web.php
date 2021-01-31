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
//    return view('welcome');
//});
//Route::get('/welcome',function (){
//   return "welcome";
//})->name("a");
//
//Route::get('/string','Firstcontroller@showString');
//Route::get('/landing',function (){
//    return view('landing');
//});
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'offer'],function (){
   Route::get('create','OffersController@create');
   Route::post('post','OffersController@post')->name('save');
});
