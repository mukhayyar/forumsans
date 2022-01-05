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
Route::get('/test', 'HomeController@test');




Route::get('/tag', 'HomeController@tag');

Route::get('/user', 'HomeController@user');

Route::get('/user/detail/{user}', 'HomeController@showUser');


Route::get('/pertanyaan', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web','auth']], function(){
    Route::post('/detail/{pertanyaan}/jawaban_benar','PertanyaanController@yes');
    Route::post('/detail/{pertanyaan}/komentar', 'KomentarPertanyaanController@store');
    Route::post('/detail/{pertanyaan}/komentar/{jawaban}', 'KomentarJawabanController@store');
    Route::post('/detail/{pertanyaan}/jawaban', 'JawabanController@store');
    Route::get('/create', function () {
        return view('new_question');
    });
    Route::post('/create', 'PertanyaanController@store');
    Route::get('/detail/{pertanyaan}', 'PertanyaanController@show')->name('detail');
    Route::get('/detail/{pertanyaan}/komentar', 'KomentarPertanyaanController@create');
    Route::get('/detail/{pertanyaan}/komentar/{jawaban}', 'KomentarJawabanController@create');
    Route::put('/upvote_pertanyaan/{pertanyaan}', 'PertanyaanController@upvote_pertanyaan');
    Route::put('/upvote_jawaban/{jawaban}', 'JawabanController@upvote_jawaban');
    Route::put('/downvote_pertanyaan/{pertanyaan}', 'PertanyaanController@downvote_pertanyaan');
    Route::put('/downvote_jawaban/{jawaban}', 'JawabanController@downvote_jawaban');
});

Auth::routes();
