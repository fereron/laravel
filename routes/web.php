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


Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
});


Route::get('/', ['uses' => 'IndexController@index', 'as' => 'home']);

Route::get('/portfolios', ['uses' => 'PortfoliosController@show', 'as' => 'portfolios']);
Route::get('/portfolios/{alias}', ['uses' => 'PortfoliosController@showPortfolio', 'as' => 'portfolio.show']);


Route::get('/cat/{cat_alias}', ['uses' => 'BlogController@show', 'as' => 'articles_cat'])->where('cat_alias', '[a-z]+');
Route::get('/articles', ['uses' => 'BlogController@show', 'as' => 'blog']);
Route::get('/articles/{alias}', ['uses' => 'BlogController@showArticle', 'as' => 'article.show']);

Route::get('/contact', ['uses' => 'ContactController@show', 'as' => 'contact']);
Route::post('/contact', ['uses' => 'ContactController@post', 'as' => 'contact.post']);

Route::post('/comment', ['uses' => 'CommentController@store', 'as' => 'comment.store']);





