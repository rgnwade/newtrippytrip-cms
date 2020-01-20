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


Route::get('/', 'Auth\LoginController@Login')->name('index');

Route::post('/login-admin', 'Auth\LoginController@postLogin')->name('login-admin');

Route::get('/dashboard', 'PageController@Index')->name('dashboard');

Route::get('/all-user', 'PageController@allUser')->name('all-user');

Route::get('/all-client', 'PageController@allClient')->name('all-client');

Route::get('/all-employee', 'PageController@allEmployee')->name('all-employee');

Route::post('/register-employee', 'PageController@registerEmployee')->name('register-employee');

Route::get('/add-article', 'ArticleController@addArticle')->name('add-article');

Route::get('/article/{id}', 'PageController@getArticlebyId')->name('article');

Route::get('/edit-article/{id}', 'ArticleController@editArticlebyId')->name('edit-article');

Route::get('/add-client', 'PageController@addClient')->name('add-client');

Route::get('/get-contract', 'PageController@getContract')->name('get-contract');

Route::post('/add-contract', 'PageController@addContract')->name('add-contract');

Route::get('/get-subscribe', 'PageController@getSubscribe')->name('get-subscribe');

Route::post('/post-article', 'ArticleController@postArticle')->name('post-article');

Route::post('/register-client', 'PageController@registerClient')->name('register-client');

Route::get('/get-article-single/{id}', 'ArticleController@getArticleSingle')->name('get-article-single');

Route::get('/media', 'PageController@media')->name('media');

Route::post('/post-media', 'PageController@addMedia')->name('post-media');

Route::get('/logout-admin', 'Auth\LoginController@LogoutUser')->name('logout-admin');
