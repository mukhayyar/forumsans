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

Route::get('/detail/{pertanyaan}', 'PertanyaanController@show')->name('detail');

Route::post('/detail/{pertanyaan}/jawaban', 'JawabanController@store');

Route::get('/create', function () {
    return view('new_question');
});

Route::post('/create', 'PertanyaanController@store');

Route::get('/tag', 'HomeController@tag');

Route::get('/user', 'HomeController@user');

Route::get('/user/detail', function () {
    return view('user_detail');
});

Route::put('/upvote_pertanyaan/{pertanyaan}', 'PertanyaanController@upvote_pertanyaan');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
