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
Route::filter('ajax_check', function(){
    if(\Illuminate\Support\Facades\Request::ajax())
    {
        return true;
    }
});

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider')->where('provider', 'facebook|github|twitter');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback')->where('provider', 'facebook|github|twitter');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::post('/', ['as' => 'status', 'uses' => 'StatusController@postStatus']);

Route::get('profile', ['as' => 'profile', 'uses' => 'ProfileController@index']);
Route::get('profile/{user}', ['as' => 'profile.show', 'uses' => 'ProfileController@show']);

Route::get('users', ['as' => 'users', 'uses' => 'UserController@index']);
Route::get('users/add-connection/{id}', ['as' => 'add-connection', 'uses' => 'UserController@addConnection']);
Route::get('users/remove-connection/{id}', ['as' => 'remove-connection', 'uses' => 'UserController@removeConnection']);

Route::post('/chat-status', ['as' => 'toggle-status', 'uses' => 'UserController@toggleChat']);

Route::get('notifications', ['as' => 'notifications', 'uses' => 'NotificationController@index']);
Route::post('notifications', ['as' => 'notification-read', 'uses' => 'NotificationController@readNotification']);

Route::get('messages', ['as' => 'messages', 'uses' => 'MessageController@index']);
Route::get('message/{id}', ['as' => 'message.show', 'uses' => 'MessageController@show']);
Route::get('message-user/{id}', ['as' => 'message-user', 'uses' => 'MessageController@sendMessage']);
Route::post('mesasge-user/{id}', ['as' =>'messages.store', 'uses' => 'MessageController@store']);
Route::put('message/{id}', ['as' => 'messages.update', 'uses' => 'MessageController@update']);