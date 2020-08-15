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
Route::post('/detail/{pertanyaan}/jawaban_benar','PertanyaanController@yes');

Route::get('/detail/{pertanyaan}/komentar', 'KomentarPertanyaanController@create');
Route::post('/detail/{pertanyaan}/komentar', 'KomentarPertanyaanController@store');

Route::get('/detail/{pertanyaan}/komentar/{jawaban}', 'KomentarJawabanController@create');
Route::post('/detail/{pertanyaan}/komentar/{jawaban}', 'KomentarJawabanController@store');


Route::post('/detail/{pertanyaan}/jawaban', 'JawabanController@store');

Route::get('/create', function () {
    return view('new_question');
});

Route::post('/create', 'PertanyaanController@store');

Route::get('/tag', 'HomeController@tag');

Route::get('/user', 'HomeController@user');

Route::get('/user/detail/{user}', 'HomeController@showUser');

Route::put('/upvote_pertanyaan/{pertanyaan}', 'PertanyaanController@upvote_pertanyaan');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
