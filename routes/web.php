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
// For dealing with other users 
Route::get('usersList','UsersController@getUsersList');
Route::get('usersList/{user}/userProfile','UsersController@getUserProfile');
Route::post('usersList/{user}/follow','UsersController@theFollowing');

// for the logedin user
Route::get('updateProfile','UsersController@getUpdateProfile');
Route::get('updateProfile/addresses','UsersController@getAddresses');
Route::post('geoLocation','UsersController@saveGeoLocation');
Route::get('updateProfile/addressesList','UsersController@getAddressesList');
Route::get('/addresses/{location}/edit','UsersController@getAddressesEdit');
Route::post('/addresses/{location}/update','UsersController@updateGeoLocation');
Route::delete('updateProfile/addresses/{location}/delete','UsersController@deleteGeoLocation');

//Books 
Route::get('booksList',"BooksController@getBooksList");
Route::get('booksList/{book}/add',"BooksController@getBook");
Route::post('/bookAdding',"BooksController@bookAdding");

Route::get('matchMaking',"BooksController@comparingBooks");
Route::get('aquiringBooks','BooksController@aquiringBooks');

// Notifications
Route::get('notifications',"NotificationsController@getNotifications");
Route::get('notification/{notification}',"NotificationsController@getNotification");

//Genres
Route::get('genres','GenresController@getGenres');

// Authers
Route::get('/authers',"AuthersController@getAuthers");
Route::get('/authers/{auther}/autherProfile',"AuthersController@getAutherProfile");
Route::get('/authers/{auther}/autherProfile/books',"AuthersController@getAutherBooks");
Route::post('/autherFollowing',"AuthersController@autherFollowing");

Route::get('aquiringAuthers','AuthersController@aquiringAuthers');



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/facebook', 'Auth\RegisterController@getFacebook');
Route::get('/facebook-callback', 'Auth\RegisterController@getFacebookCallback');
Route::get('/twitter', 'Auth\RegisterController@getTwitter');
Route::get('/twitter-callback', 'Auth\RegisterController@getTwitterCallback');
Route::get('/google', 'Auth\RegisterController@getGoogle');
Route::get('/google-callback', 'Auth\RegisterController@getGoogleCallback');
