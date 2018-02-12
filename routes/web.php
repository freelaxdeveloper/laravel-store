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

Route::middleware(['auth'])->name('cat.')->prefix('category')->group(function () {
    Route::get('/new/{category?}', 'CategoryController@new')->name('new');
    Route::post('/new/{category?}', 'CategoryController@newPost')->name('newPost');
    Route::get('/delete/{category}', 'CategoryController@delete')->name('delete');
    Route::get('/view/{category}', 'CategoryController@view')->name('view');
});

Auth::routes();

