<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HelloMiddleware;

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

Route::get('hello', function () {
    return view('hello.index');
});

Route::get('/sample', 'SampleController@index'); // sample.blade.php, コントローラー名@アクション名

Route::get('/sample/contact', 'SampleController@contact')->name('contact.index');

Route::post('/sample/confirm', 'SampleController@confirm')->name('contact.confirm');

Route::post('/sample/complete', 'SampleController@complete')->name('contact.complete');

Route::get('/practice/practice', 'PracticeController@practice');

Route::get('/login', 'LoginController@login');

Route::get('/top', 'LoginController@top')->name('top');

Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@post');

Route::get('hello', 'HelloController@index')->middleware('hello'); // /helloにhelloグループが設定される
Route::get('hello/add', 'HelloController@add');
Route::post('hello/add', 'HelloController@create');
Route::get('hello/edit', 'HelloController@edit');
Route::post('hello/edit', 'HelloController@update');
