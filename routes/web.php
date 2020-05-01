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
Route::get('/dash', function () {
    return view('layouts.dashboard');
});
Route::get('/', function () {
    return view('welcome');
});
 Route::get('/admin', function () {
     return view('admin.adminhome');
 });

//  Route::get('/admin',function(){
//     return view('admin.adminhome');
// });
 Auth::routes();

// User
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tenderlist','HomeController@list');
Route::get('/profile','HomeController@personal');
Route::get('/progress','HomeController@progress');
Route::get('/complete','HomeController@complete');
Route::get('/award','HomeController@award');
Route::get('/uploads','HomeController@uploads');
Route::post('/submit/{id}','HomeController@submit')->name('submit');



// Admin
Route::group(['prefix' => 'admin','as'=>'admin.'],function(){

    Route::get('/tender/bids/{id}','TenderController@bids')->name('bids');
    Route::get('/tender/inprogress','TenderController@inProgress')->name('inprogress');
    Route::get('/tender/closed','TenderController@closed')->name('closed');

    Route::get('/tender/showInvoices','TenderController@showInvoices')->name('showInvoices');
    Route::resource('tender', 'TenderController');
});

Route::post('/selected/{id}','TenderController@selected')->name('selected');
Route::post('/changeStatus/{id}','TenderController@changeStatus')->name('changeStatus');

Route::post('/invoice/{id}','HomeController@invoice')->name('invoice');
Route::get('/vendors','TenderController@registered_vendors')->name('vendors');
Route::get('/vendorDetails/{id}','TenderController@vendor_details')->name('vendorDetails');
Route::post('/selectVendors','TenderController@select_vendors')->name('selectVendors');
Route::post('/postdraft','TenderController@post_draft')->name('postdraft');
Route::get('/showDraft','TenderController@show_draft')->name('draft');
Route::put('/updatedraft/{id}','TenderController@update_draft')->name('updatedraft');
