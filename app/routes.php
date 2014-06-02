<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'FrontController@showHome');
Route::get('post/{id}', 'FrontController@showPostDetail');
Route::get('kategori/{id}', 'FrontController@showCategory');
Route::post('comment', 'CommentController@store');

Route::group(array('before' => 'auth'), function()
{
	Route::get('admin', function()
    {
        return View::make('admin/dashboard');
    });

    Route::get('admin/dashboard', function()
    {
        return View::make('admin/dashboard');
    });
    Route::resource('admin/post', 'PostController');
    Route::resource('admin/category', 'CategoryController');
    Route::resource('admin/setting', 'SettingController');
    Route::resource('admin/user', 'UserController');
    Route::resource('admin/comment', 'CommentController');
    Route::get('admin/logout', 'UserController@logout');
});
Route::get('login', 'UserController@login');
Route::post('admin/authenticate', 'UserController@authenticate');
