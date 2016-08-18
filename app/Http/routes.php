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

/*Route::get('/', function () {
    return view('welcome');
});*/

\Route::controller('auth', 'Auth\AuthController',
    [
        'postLogin' => 'post.login',
        'getLogin' => 'get.login',
        'getRegister' => 'get.register',
        'postRegister' => 'post.register',
        'getLogout'    => 'logout'
    ]
);

\Route::group(['middleware' => 'auth'], function() {
    \Route::resource(
        'admin/entry',
        'Admin\EntryController',
        ['except' => ['destroy', 'show']]
    );
});

\Route::get('/test', 'TestController@index');
\Route::post('/test', [
    'as' => 'test', 'uses' => 'TestController@update'
]);
get('/', [
    'as' => 'home', 'uses' => 'ApplicationController@index'
]);
\Route::get('entry/edit_index', 'EntryController@edit_index');
\Route::resource('entry', 'EntryController', ['only' => ['index', 'show', 'create']]);
\Route::resource('comment', 'CommentController', ['only' => ['store']]);
\Route::group(['namespace' => 'Api', 'prefix' => 'api'], function() {
    \Route::get('login', 'LoginController@login');
    \Route::get('logout', 'LoginController@logout');
    \Route::post('entry/priority/', 'EntryController@updatePriority');
    \Route::post('entry/', 'EntryController@store');
    \Route::post('entry/{id}', 'EntryController@update');
    \Route::post('entry/public/{id}', 'EntryController@updateDisplay');
    \Route::post('design/{id}', 'DesignController@update');
    \Route::post('image', 'ImageController@create');
});
