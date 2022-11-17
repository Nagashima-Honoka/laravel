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

Route::get('/sample', 'SampleController@index'); // web.php → sample.blade.php, function index

Route::get('/sample/contact', 'SampleController@contact')->name('contact.index');

Route::get('/sample/confirm', 'SampleController@confirm')->name('contact.confirm');
// Route::post('/sample/confirm', 'SampleController@confirm')->name('contact.confirm');

Route::get('/sample/complete', 'SampleController@complete')->name('contact.complete');
// Route::post('/sample/complete', 'SampleController@complete')->name('contact.complete');

Route::get('/practice/practice', 'PracticeController@practice');

Route::get('/login', 'LoginController@login');

Route::get('/top', 'LoginController@top')->name('top');

Route::get('/logout', 'LoginController@logout')->name('logout');
