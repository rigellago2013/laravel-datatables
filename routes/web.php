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
    return view('auth.login');
});
Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('admin/request', 'HomeController@index')->name('request');
    Route::get('admin/orientation', 'HomeController@orientation',)->name('orientation');
    Route::get('admin/consultation', 'HomeController@consultation')->name('consultation');
    Route::get('admin/request/{id}', 'HomeController@getDocumentRequestById');
    Route::patch('admin/request/edit', 'HomeController@editDocumentRequest');
    Route::get('api/admin/request', 'HomeController@getDocumentRequestFormType');
    Route::get('admin/request/prefecture/{id}', 'HomeController@getDocumentRequestPerPrefecture');
});

