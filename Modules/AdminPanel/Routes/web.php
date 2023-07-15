<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('adminpanel')->group(function() {
    Route::get('/', 'AdminPanelController@index')->name('admin');
    Route::get('/products', 'AdminPanelController@products')->name('admin.products');

    Route::any('/products_create', 'AdminPanelController@products_create')->name('admin.products.create');

    Route::any('/products_delete', 'AdminPanelController@products_delete')->name('admin.products.delete'); //TODO middlewatra only admin
    Route::any('/products_edit', 'AdminPanelController@products_edit')->name('admin.products.edit'); //TODO middlewatra only admin

    Route::any('/categories', 'AdminPanelController@categories')->name('admin.categories'); //TODO middlewatra only admin
    Route::any('/categories_create', 'AdminPanelController@categories_create')->name('admin.categories.create'); //TODO middlewatra only admin
    Route::any('/categories_edit', 'AdminPanelController@categories_edit')->name('admin.categories.edit'); //TODO middlewatra only admin
    Route::any('/categories_delete', 'AdminPanelController@categories_delete')->name('admin.categories.delete'); //TODO middlewatra only admin

    Route::any('/orders', 'AdminPanelController@orders')->name('admin.orders'); //TODO middlewatra only admin
});
