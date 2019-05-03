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
    Route::get('admin/', 'HomeController@index')->name('index');
    Route::get('admin/branch/{id}/request', 'HomeController@getBranchRequest')->name('branchrequest');
    Route::get('admin/branch/{id}/consultation', 'HomeController@getBranchConsultation')->name('branchconsultation');
    Route::get('admin/branch/{id}/orientation', 'HomeController@getBranchOrientation')->name('branchorientation');
    Route::get('admin/orientation', 'HomeController@orientation')->name('orientation');
    Route::get('admin/consultation', 'HomeController@consultation')->name('consultation');
    Route::get('admin/request/{id}', 'HomeController@getDocumentRequestById');
    Route::get('admin/orientation/{id}', 'HomeController@getOrientationById');
    Route::get('admin/consultation/{id}', 'HomeController@getConsultationById');
    Route::patch('admin/request/edit', 'HomeController@editDocumentRequest');
    Route::get('api/admin/request', 'HomeController@getDocumentRequestFormType');
    Route::get('admin/request/prefecture/{id}', 'HomeController@getDocumentRequestPerPrefecture');
    Route::put('admin/request/update', 'HomeController@update');
});

