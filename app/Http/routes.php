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

Route::get('/', 'WelcomeController@index');
Route::get('faq', 'WelcomeController@faq');
Route::get('about', 'WelcomeController@about');

Route::get('home', 'HomeController@index');
Route::resource('users', 'ProfileController', ['only' => ['show', 'update']]);
Route::resource('avatars', 'AvatarsController', ['only' => 'update']);
Route::resource('password', 'PasswordController', ['only' => 'update']);
Route::resource('lessons', 'LessonsController');
Route::get('search', 'SearchController@user');
Route::resource('activities', 'ActivitiesController', ['only' => ['store', 'destroy']]);

Route::group(['namespace' => 'Pages'], function() {
    Route::resource('categories', 'CategoriesController', ['only' => 'index']);
    Route::resource('words', 'WordsController', ['only' => 'index']);
    Route::post('words', 'WordsController@filter');
});

Route::group(['namespace' => 'Auth'], function() {
    Route::group(['prefix' => 'auth'], function() {
        Route::get('login', 'AuthController@getLogin');
        Route::post('login', 'AuthController@postLogin');
        Route::get('logout', 'AuthController@getLogout');

        // Registration routes...
        Route::get('register', 'AuthController@getRegister');
        Route::post('register', 'AuthController@postRegister');
    });
    
    Route::get('emails/password', function() {
        return view('emails/password');
    });
    // Password reset link request routes...
    Route::get('password/email', 'PasswordController@getEmail');
    Route::post('password/email', 'PasswordController@postEmail');

    // Password reset routes...
    Route::get('password/reset/{token}', 'PasswordController@getReset');
    Route::post('password/reset', 'PasswordController@postReset');
});

Route::group(['prefix'=>'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::get('dashboard', function() {
        return view('admin.dashboard');
    });

    // Manage Users
    Route::resource('users', 'UsersController', ['except' => ['show', 'edit', 'update']]);
    // Manage Categories
    Route::resource('categories', 'CategoriesController');

    // Manage Words
    Route::resource('words', 'WordsController');

    //Manage Answers
    Route::resource('answers', 'AnswersController', ['except' => ['show', 'index']]);
});


