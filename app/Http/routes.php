<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    Route::get('/article/show/{id}', 'ArticleController@show');

    Route::get('/admin', 'Admin\HomeController@index');
    Route::get('/admin/article', 'Admin\ArticleController@home');
    Route::get('/admin/article/create', 'Admin\ArticleController@create');
    Route::post('/admin/article/store', 'Admin\ArticleController@store');
    Route::get('/admin/article/edit/{id}', 'Admin\ArticleController@edit');
    Route::get('/admin/article/delete/{id}', 'Admin\ArticleController@delete');
});