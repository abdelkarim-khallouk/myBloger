<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

//Route::get('/home', 'HomeController@index');
//Route::get('/articles', 'HomeController@showArticles');
//Route::get('/article/{id}', 'HomeController@showArticle');

Route::get('/add', 'ArticleController@add');
Route::post('/add', 'ArticleController@add');

Route::get('/edit/{id}', 'ArticleController@edit');
Route::post('/edit/{id}', 'ArticleController@edit');

Route::get('/articles', 'ArticleController@index');

Route::get('/article/{id}', 'ArticleController@show');
Route::post('/article/{id}', 'ArticleController@show');

Route::get('/delete/{id}', 'ArticleController@destroy');