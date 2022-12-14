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

// Route::get('hello', 'HelloController@index')->middleware('hello'); // /helloにhelloグループが設定される
Route::get('hello', 'HelloController@index')->middleware('auth'); // /helloアクションはログインが必須になる。ログインしないでアクセスすると、ログインページにリダイレクトされる・
Route::get('hello/add', 'HelloController@add');
Route::post('hello/add', 'HelloController@create');
Route::get('hello/edit', 'HelloController@edit');
Route::post('hello/edit', 'HelloController@update');
Route::get('hello/del', 'HelloController@del');
Route::post('hello/del', 'HelloController@remove');
Route::get('hello/show', 'HelloController@show');
Route::get('hello/rest', 'HelloController@rest');
Route::get('hello/session', 'HelloController@ses_get');
Route::post('hello/session', 'HelloController@ses_put');

Route::get('person', 'PersonController@index');
Route::get('person/find', 'PersonController@find');
Route::post('person/find', 'PersonController@search');
Route::get('person/add', 'PersonController@add');
Route::post('person/add', 'PersonController@create');
Route::get('person/edit', 'PersonController@edit');
Route::post('person/edit', 'PersonController@update');
Route::get('person/del', 'PersonController@delete');
Route::post('person/del', 'PersonController@remove');

Route::get('board', 'BoardController@index');
Route::get('board/add', 'BoardController@add');
Route::post('board/add', 'BoardController@create');

Route::resource('rest', 'RestappController'); // /rest下にCRUD関係のアクセスがまとめて登録される
