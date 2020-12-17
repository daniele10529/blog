<?php

//ctrl+b sidebar
//ctrl+ò terminal

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

  //gestisce le rotte di autenticazione, fondamentele per i redirect dopo il login, logout, registrazione
  Auth::routes();

  //rotte singole che interessano ogni utente
  Route::get('/', 'App\Http\Controllers\PagesController@home');
  Route::get('/{slug?}', 'App\Http\Controllers\PagesController@show');
  Route::get('/home', 'App\Http\Controllers\HomeController@index');
  Route::get('/user/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/user/register', 'App\Http\Controllers\Auth\RegisterController@register')->name('register');
  Route::get('/user/logout', 'App\Http\Controllers\Auth\LoginController@logout');
  Route::get('/user/login', 'App\Http\Controllers\Auth\LoginController@ShowLoginForm')->name('login');
  Route::post('/user/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
  Route::post('/comments', 'App\Http\Controllers\CommentsController@newComment');


  //gruppo di rotte di gestione ammistratore
  //la parte iniziale è comune a tutte le rotte
Route::group(array(
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Admin',
    'middleware' => 'manager'
), function () {
    Route::get('/user', ['as' => 'admin.users.index', 'uses' => 'UsersController@index']);
    Route::get('/roles', 'RolesController@index');
    Route::get('/roles/create', 'RolesController@create');
    Route::post('/roles/create', 'RolesController@store');
    //passo anche il valore id alla rotta in modo da poterlo ricavare con il blade nelle views
    Route::get('/user/{id?}/edit', 'UsersController@edit');
    Route::post('/user/{id?}/edit', 'UsersController@update');
    Route::get('/dashboard', 'PagesController@index');
    Route::get('/posts', 'Posts\PostsController@index');
    Route::get('/posts/create', 'Posts\PostsController@create');
    Route::post('/posts/create', 'Posts\PostsController@store');
    Route::get('/posts/{id?}/edit', 'Posts\PostsController@edit');
    Route::post('/posts/{id?}/edit', 'Posts\PostsController@update');
    Route::get('/posts/{id?}/delete', 'Posts\PostsController@destroy');
    Route::get('/categories', 'Posts\CategoriesController@index');
    Route::get('/categories/create', 'Posts\CategoriesController@create');
    Route::post('/categories/create', 'Posts\CategoriesController@store');
    Route::get('/image/{id?}/image-upload', 'ImageUploadController@index');
    Route::post('/image/{id?}/image-upload', 'ImageUploadController@store')->name('image.upload.post');
    Route::post('/image/image-upload', 'ImageUploadController@update')->name('image.upload.update');
    //la proprietà name assegna un segna posto alla rotta ricavabile con il blade per indirizzare la pagina
});


