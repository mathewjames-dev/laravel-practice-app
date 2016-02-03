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
