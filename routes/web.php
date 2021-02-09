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
/*
        starting test routes
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
Route::get('/home', 'HomeController@index')->name('home');
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');

############################################
//              Start Offer routes
############################################
Route::group(['prefix'=>'offers'],function (){
   Route::get('create','OffersController@create');
   Route::post('post','OffersController@post')->name('save');
   Route::get('edit/{id}','OffersController@edit')->name('edit');
   Route::post('update/{id}','OffersController@update')->name('update');
   Route::get('all','OffersController@all')->name('all');
   Route::get('delete/{id}','OffersController@delete')->name('delete');
});
############################################
//              End Offer routes
############################################

############################################
//              Start Ajax routes
############################################
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

############################################
//              Start middleware routes
############################################
Route::get('/notauth',function (){
    return "you are not authorized";
})->name('notauth');
Route::group(['namespace'=>'auth','middleware'=>'adult'],function(){
   Route::get('adult/','AdultController@index')->name('adult.index');
});
Route::get('/site','Auth\AdultController@site')->name('site')->middleware('auth:web');
Route::get('/admin','Auth\AdultController@admin')->name('admin')->middleware('auth:admin');
Route::get('/admin/login','Auth\AdultController@loginadmin')->name('admin.login');
Route::post('/admin/login','Auth\AdultController@CheckAdminLogin')->name('check.admin.login');
############################################
//              End middleware routes
############################################

############################################
//              start Models relation routes
############################################
Route::get('/has-one','RelationsController@hasone');
############################################
//              End Models relation routes
############################################
