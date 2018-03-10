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
Route::get('/', 'HomeController@index')->name('home');

Route::get('/categories', 'CategoryController@index')->name('cat');

Route::name('cat.')->prefix('category')->group(function () {

    Route::group(['middleware' => ['roles'], 'roles' => ['admin']], function () {
        Route::get('/new/{category?}', 'CategoryController@new')->name('new');
        Route::post('/new/{category?}', 'CategoryController@newPost')->name('newPost');
        Route::get('/delete/{category}', 'CategoryController@delete')->name('delete');
    });

    Route::get('/view/{category}', 'CategoryController@view')->name('view');
});
Route::name('prod.')->prefix('product')->group(function () {

    Route::get('/view/{product}', [
        'as' => 'view',
        'uses' => 'ProductController@view',
    ]);

    Route::group(['middleware' => ['roles'], 'roles' => ['admin']], function () {
        Route::get('/edit/{product}', 'ProductController@edit')->name('edit');
        Route::post('/edit/{product}', 'ProductController@save')->name('save');
    });
});

Auth::routes();

