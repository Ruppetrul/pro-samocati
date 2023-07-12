<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Product routes
|--------------------------------------------------------------------------
|
| Here you can see product routes.
|
*/
//TODO only for admin
Route::group(['prefix' => 'panel', 'middleware' => 'auth'], static function ($router) {
    $router->resource('products', 'ProductController', ['except' => 'show']);
//    $router->patch('products/{category}', 'ProductController', ['except' => 'show']);
    /*$router->patch('categories/{id}/inactive', ['uses' => 'CategoryController@inactive', 'as' => 'categories.change.status.inactive']);*/
});
