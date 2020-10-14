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

$router->group(['prefix' => 'company'], function () use ($router) {
    $router->get('',  ['uses' => 'CompanyController@showAllCompany']);

    $router->get('/{id}', ['uses' => 'CompanyController@showOneCompany']);

    $router->post('/create', ['uses' => 'CompanyController@create']);

    $router->delete('/{id}', ['uses' => 'CompanyController@delete']);

    $router->put('/{id}', ['uses' => 'CompanyController@update']);
});

$router->group(['prefix' => 'user'], function () use ($router) {
    $router->post('/creates', ['uses' => 'UserController@creates']);

    $router->delete('/{id}', ['uses' => 'UserController@delete']);

    $router->put('/{id}', ['uses' => 'UserController@update']);
});

$router->group(['prefix' => 'event'], function () use ($router) {
    $router->post('/create', ['uses' => 'EventController@create']);

    $router->delete('/{id}', ['uses' => 'EventController@delete']);

    $router->put('/{id}', ['uses' => 'EventController@update']);
});

$router->get('/', ['uses' => 'UserEventController@showEventByUser']);
$router->get('/user/create', ['uses' => 'UserEventController@createPage']);
$router->post('/data/create', ['uses' => 'UserEventController@create']);
$router->get('/data/update/{id}', ['uses' => 'UserEventController@updatePage']);
$router->post('/data/update', ['uses' => 'UserEventController@update']);

