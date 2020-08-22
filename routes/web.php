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


Auth::routes([
    'register' => false, // Register Routes...
    'reset' => false, // Reset Password Routes...
    'verify' => false, // Email Verification Routes...  
]);


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add', 'DocumentController@add')->name('add')->middleware('auth');
Route::get('/archive', 'DocumentController@archive')->name('archive')->middleware('auth');
Route::get('/document_type', 'DocumentController@documentType')->name('document_type')->middleware('auth');