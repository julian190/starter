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
  return view('welcome');
});
//Route::get('/welcome',function (){
//   return "welcome";
//})->name("a");
//
//Route::get('/string','Firstcontroller@showString');
//Route::get('/landing',function (){
//    return view('landing');
//});
//
Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'offers'],function (){
   Route::get('create','OffersController@create');
   Route::post('post','OffersController@post')->name('save');
   Route::get('edit/{id}','OffersController@edit')->name('edit');
   Route::post('update/{id}','OffersController@update')->name('update');
   Route::get('all','OffersController@all')->name('all');
   Route::get('delete/{id}','OffersController@delete')->name('delete');
});


############################################
//              Start Ajax routes
###########################################
Route::group(['prefix'=>'ajaxoffers'],function(){
    Route::get('create','OffersController@ajaxcreate');
    Route::post('post','OffersController@ajaxpost')->name('ajaxsave');
    Route::get('all','OffersController@ajaxall');
    Route::post('delete','OffersController@ajaxdelete')->name('ajaxdelete');
    Route::get('edit/{id}','OffersController@ajaxedit')->name('ajaxedit');
    Route::post('update',"OffersController@ajaxupdate")->name("ajaxupdate");
});
################################################
//              End Ajax Routes
################################################
