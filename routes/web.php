<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    //List
    $router->get('users',  ['uses' => 'UserController@showAllUsers']);
    //View
    $router->get('users/{id}', ['uses' => 'UserController@showOneUser']);
    //Add
    $router->post('users', ['uses' => 'UserController@create']);
    //Delete
    $router->delete('users/{id}', ['uses' => 'UserController@delete']);
    //Update
    $router->put('users/{id}', ['uses' => 'UserController@update']);
});


