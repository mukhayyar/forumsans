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

Route::get('/detail/{pertanyaan}', 'PertanyaanController@show');

Route::get('/create', function () {
    return view('new_question');
});

Route::get('/tag', function () {
    return view('tag');
});

Route::get('/user', function () {
    return view('users');
});

Route::get('/user/detail', function () {
    return view('user_detail');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
