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

// Auth::routes();
Auth::routes();

Route::get('/email', function () {
    return new NewUserWelcomeMail();
});

Route::post('follow/{user}', 'FollowsController@store');

Route::get('/', 'PostsController@index');

//the order of the lines with the routes is very important. For example: get('/p/{post}' before get('/p/create' is different from the opposite. Because they're conflicting. In fact /p/{post} includes everything after /p
Route::get('/p/create/{title?}/{author?}/{price?}/{buyLink?}/{thumbnail?}', 'PostsController@create');
Route::get('/p/{post}', 'PostsController@show'); 
Route::post('/p', 'PostsController@store');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit'); //this shows the form of edit profile
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update'); //this will actually do the process of updating our profile
Route::get('addCollection','collectionController@index');
Route::get('/storeCollection/{title?}/{author?}/{price?}/{buyLink?}/{thumbnail?}','collectionController@store');


