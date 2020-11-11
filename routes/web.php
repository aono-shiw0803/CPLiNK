<?php

use Illuminate\Support\Facades\Route;

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
  if(Auth::user()){
    return redirect('/posts');
  } else {
    return redirect('/login');
  }
});

Route::get('/home', function(){
  if(Auth::user()){
    return redirect('/posts');
  } else {
    return redirect('/login');
  }
});

// users
Route::resource('/users', 'UserController')->middleware('auth');
Route::resource('/users', 'UserController', ['only' => ['edit', 'update', 'destroy']])->middleware('can:admin');
Route::post('/users/delete/{id}', 'UserController@delete')->middleware('auth');

// posts
Route::resource('/posts', 'PostController')->middleware('auth');
Route::post('/posts/delete/{id}', 'PostController@delete')->middleware('auth');

// sites
Route::resource('/sites', 'SiteController')->middleware('auth');
// Route::post('/sites/delete/{id}', 'SiteController@delete')->middleware('auth');
Route::post('delete_site', 'SiteController@delete_site')->middleware('auth');

// links
Route::resource('/links', 'LinkController')->middleware('auth');
// Route::post('/links/delete/{id}', 'LinkController@delete')->middleware('auth');
Route::post('delete_link', 'LinkController@delete_link')->middleware('auth');

// Auth::routes();
// ↑下記のルーティングを使用しない場合はコメントアウトを解除する。
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => ['auth', 'can:admin']], function () {
  //ユーザー登録
  Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
  Route::post('register', 'Auth\RegisterController@register');
});
