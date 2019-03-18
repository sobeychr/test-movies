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

// Test entries
$router->get('/test', function () use ($router) {
    return $router->app->version();
});

$router->get('/test/anticipations', [
    'uses' => 'TestController@generateAnticipations',
]);

$router->get('/test/movies', [
    'uses' => 'TestController@generateMovies',
]);

$router->get('/test/rates', [
    'uses' => 'TestController@generateRates',
]);

$router->get('/test/update[/{output:user|movie}]', [
    'uses' => 'TestController@updateRates',
]);

$router->get('/test/users', [
    'uses' => 'TestController@generateUsers',
]);

// Actual routes
$router->get('/[home]', [
    'as'   => 'home',
    'uses' => 'HomeController@showHome',
]);

// Movies
$router->get('/movie', [
    'as'   => 'movieList',
    'uses' => 'MovieController@showList',
]);

$router->get('/movie/{movieId:\d+}[/{movieName:[a-z\-]+}]', [
    'as'   => 'movie',
    'uses' => 'MovieController@showMovie',
]);

// Users
$router->get('/user', [
    'as'   => 'userList',
    'uses' => 'UserController@showList',
]);

$router->get('/user/{userId:\d+}[/{userName:[a-z\-]+}]', [
    'as'   => 'user',
    'uses' => 'UserController@showUser',
]);
