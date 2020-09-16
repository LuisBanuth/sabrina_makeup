<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layouts.app');
});

Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){

    Route::resource('products', 'ProductController');
    Route::post('products/deletephoto', 'ProductController@deletePhoto')->name('products.deletephoto');

    Route::resource('services', 'ServiceController');

    Route::prefix('categories')->name('categories.')->group(function(){
        Route::resource('services', 'ServiceCategoryController');
        Route::resource('products', 'ProductCategoryController');
    });

});

Route::prefix('filepond')->group(function(){
    Route::post('/process', 'FilepondController@process');
    Route::delete('/revert', 'FilepondController@revert');
    Route::get('/load/{photo}', 'FilepondController@load');
});
