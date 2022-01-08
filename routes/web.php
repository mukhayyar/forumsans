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

// public
Route::get('/', function () {
    return view('index');
});
Route::get('/tag', 'HomeController@tag');
Route::get('/users', 'HomeController@user');
Route::get('/user/detail/{user}', 'HomeController@showUser');
Route::get('/pertanyaan', 'HomeController@index')->name('pertanyaan.index');
Route::get('/pertanyaan/{pertanyaan:slug}', 'HomeController@show_blog')->name('detail');
Route::get('/blog','HomeController@blog')->name('blog.index');
Route::get('/blog/{blog:slug}','HomeController@detail_blog')->name('blog.detail');
Route::get('/job','HomeController@job')->name('job.index');
Route::get('/tag/{tag}','HomeController@job')->name('tag.index');

Route::group(['middleware' => ['web','auth']], function(){
    // Pertanyaan
    Route::group(['middleware' => ['user']], function(){
        Route::get('/create/pertanyaan', function () {
            return view('pertanyaan/new_question');
        })->name('create.pertanyaan');
        Route::post('/pertanyaan/{pertanyaan}/jawaban_benar','PertanyaanController@yes');
        Route::post('/pertanyaan/{pertanyaan}/komentar', 'KomentarPertanyaanController@store');
        Route::post('/pertanyaan/{pertanyaan}/komentar/{jawaban}', 'KomentarJawabanController@store');
        Route::post('/pertanyaan/{pertanyaan}/jawaban', 'JawabanController@store');
        Route::post('/pertanyaan/create', 'PertanyaanController@store');
        Route::get('/pertanyaan/{pertanyaan}/komentar', 'KomentarPertanyaanController@create');
        Route::get('/pertanyaan/{pertanyaan}/komentar/{jawaban}', 'KomentarJawabanController@create');
        Route::put('/upvote_pertanyaan/{pertanyaan}', 'PertanyaanController@upvote_pertanyaan');
        Route::put('/upvote_jawaban/{jawaban}', 'JawabanController@upvote_jawaban');
        Route::put('/downvote_pertanyaan/{pertanyaan}', 'PertanyaanController@downvote_pertanyaan');
        Route::put('/downvote_jawaban/{jawaban}', 'JawabanController@downvote_jawaban');


        // Blog
        Route::get('/create/blog','BlogController@create')->name('blog.create');
        Route::post('/create/blog','BlogController@store')->name('blog.store');
        Route::delete('/delete/blog/{blog:slug}','BlogController@destroy')->name('blog.destroy');
        // Portal Job
        Route::get('/create/job','JobController@create');
    });

    Route::group(['middleware' => ['admin']], function(){
        Route::get('/admin/dashboard','Admin\DashboardController@index')->name('admin.dashboard.index');
        Route::get('/admin/dashboard/pertanyaan','Admin\DashboardController@index')->name('admin.dashboard.pertanyaan.index');
        Route::get('/admin/dashboard/pertanyaan/{pertanyaan}','Admin\DashboardController@index')->name('admin.dashboard.pertanyaan.detail');
        Route::get('/admin/dashboard/blog','Admin\DashboardController@index')->name('admin.dashboard.blog.index');
        Route::get('/admin/dashboard/blog/{blog}','Admin\DashboardController@index')->name('admin.dashboard.blog.detail');
        Route::get('/admin/dashboard/job','Admin\DashboardController@index')->name('admin.dashboard.job.index');
        Route::get('/admin/dashboard/job//{job}','Admin\DashboardController@index')->name('admin.dashboard.job.detail');
        Route::get('/admin/dashboard/company','Admin\DashboardController@index')->name('admin.dashboard.company.index');
        Route::get('/admin/dashboard/company/{company}','Admin\DashboardController@index')->name('admin.dashboard.company.detail');
        Route::get('/admin/dashboard/tag','Admin\DashboardController@index')->name('admin.dashboard.tag.index');
        Route::get('/admin/dashboard/tag/{tag}','Admin\DashboardController@index')->name('admin.dashboard.tag.detail');
        Route::get('/admin/dashboard/user','Admin\DashboardController@index')->name('admin.dashboard.user.index');
        Route::get('/admin/dashboard/user/{user}','Admin\DashboardController@index')->name('admin.dashboard.user.detail');
    });

    Route::group(['middleware' => ['business']], function(){
        Route::get('/business/dashboard','JobController@index')->name('business.dashboard.index');
        Route::get('/business/job','JobController@index');
        Route::get('/business/job/create','JobController@index');
        Route::post('/business/job/create','JobController@create');
        Route::get('/business/job/{job}','JobController@edit');
        Route::put('/business/job/{job}','JobController@update');
        Route::delete('/business/job','JobController@destroy');
    });
});

// Registration Routes...
Route::get('register/{role}', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@showRegistrationForm',
]);
Auth::routes();
