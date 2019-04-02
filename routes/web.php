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
    // if you don't understand this i will explain this later in section you can leave it for now
    \Illuminate\Support\Facades\Cache::forever('count', App\Post::count());
    // the above line sets value of count to total number of posts
    return App\Post::all();
});

$router->get('posts/{post}/show','PostsController@show'); //whenever this endpoint is hit get the file PostsController and execute show method


// create new post endpoint
$router->post('posts/create','PostsController@store');

$router->post('posts/{post}/delete','PostsController@destroy');



// this route is to test and understand middleware. we will apply middleware to this route so whenever this endpoint is hit middleware applied to it will be executed first
$router->get('get', ['middleware' => 'check-age', function () {
    return App\Post::all();
}]);

$router->post('/auth/login', 'AuthController@postLogin');

$router->group(['middleware' => 'auth:api'], function($router)
{
    $router->get('/test', function() {
        return response()->json([
            'message' => 'Hello World!',
        ]);
    });
});


// now we will check Cache driver
$router->get('cache','CacheController@show');
