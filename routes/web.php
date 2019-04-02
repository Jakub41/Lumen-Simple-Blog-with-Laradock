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

// end point for all posts
$router->get('posts/all', function () use ($router) {
    return App\Post::all();
});

$router->get('posts/{post}/show','PostsController@show'); //whenever this endpoint is hit get the file PostsController and execute show method
