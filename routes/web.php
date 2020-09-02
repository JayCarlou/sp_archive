<?php

use Illuminate\Support\Facades\Route;

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

Route::post('/search', 'SearchController@search')->name('search');
Route::get('/search', 'SearchController@search')->name('search');

Auth::routes([
    'register' => false, // Register Routes...
    'reset' => false, // Reset Password Routes...
    'verify' => false, // Email Verification Routes...  
]);

//user management
Route::get('/user_management', 'SettingsController@user');
Route::get('/user_management/edit', 'SettingsController@userEdit');
Route::get('/user_management/delete', 'SettingsController@userDelete');
Route::get('/user_management/add', 'SettingsController@userAdd');

//change password
Route::get('/password', 'SettingsController@password')->middleware('auth');
Route::post('/password/change', 'SettingsController@passwordReset')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add', 'DocumentController@add')->name('add')->middleware('auth');
Route::get('/archive', 'DocumentController@archive')->name('archive')->middleware('auth');

Route::get('/document_type', 'DocumentController@documentType')->name('document_type')->middleware('auth');
Route::post('/document_type', 'DocumentController@documentTypeSave')->name('document_type')->middleware('auth');

Route::get('/subject', 'DocumentController@subject')->name('subject')->middleware('auth');
Route::post('/subject', 'DocumentController@subjectSave')->name('subject')->middleware('auth');

Route::get('/document', 'DocumentController@document')->name('document')->middleware('auth');
Route::post('/document', 'DocumentController@documentSave')->name('document')->middleware('auth');

Route::get('/document_edit/{id}', 'DocumentController@documentEdit')->name('document_edit')->middleware('auth');
Route::post('/document_edit', 'DocumentController@documentEditSave')->name('document_edit')->middleware('auth');

Route::post('/document_edit_upload', 'DocumentController@documentEditUpload')->name('document_edit')->middleware('auth');

Route::get('/document_disable/{id}','DocumentController@documentDisable')->name('document_disable')->middleware('auth');
Route::get('/document_enable/{id}','DocumentController@documentEnable')->name('document_disable')->middleware('auth');

//search
Route::get('/','SearchController@index');
Route::post('/search/getKeyword/','SearchController@getKeyword')->name('search.getKeyword');