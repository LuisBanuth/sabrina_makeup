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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/{slug}', 'HomeController@singleProduct')->name('single.product');

Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){

    Route::resource('products', 'ProductController');
    Route::prefix('products')->name('products.')->group(function(){
        Route::get('/category/{category}', 'ProductController@filterCategory')->name('filter');
        Route::post('/frontpage', 'ProductController@setFrontpage')->name('frontpage');
        Route::post('/position', 'ProductController@setPosition')->name('position');
        Route::post('/deletephoto', 'ProductController@deletePhoto')->name('deletephoto');
    });

    Route::resource('services', 'ServiceController');

    Route::prefix('categories')->name('categories.')->group(function(){
        Route::resource('services', 'ServiceCategoryController');
        Route::resource('products', 'ProductCategoryController');
    });

});

Route::prefix('filepond')->group(function(){
    Route::post('/process', 'FilepondController@process');
    Route::delete('/revert', 'FilepondController@revert');
});
