<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Cart routes
|--------------------------------------------------------------------------
|
| Here you can see cart routes.
|
*/

Route::group(['middleware' => 'auth'], static function ($router) {



});

$router->any('cart/delete/all', ['uses' => 'CartController@deleteAll', 'as' => 'cart.delete.all']);
$router->any('cart/{id}/delete', ['uses' => 'CartController@delete', 'as' => 'cart.delete']);
$router->any('cart-add/{id}/{count}', ['uses' => 'CartController@addWithCount', 'as' => 'cart.addWithCount']);
$router->any('cart-add/{id}/', ['uses' => 'CartController@add', 'as' => 'cart.add']);
$router->any('cart-save', ['uses' => 'CartController@saveFullCart', 'as' => 'cart.save.full']);

$router->any('cart-promote', ['uses' => 'CartController@promoteCartStatus', 'as' => 'cart.promote']);
