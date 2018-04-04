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

Route::get('/categories', [
    'as' => 'cat',
    'uses' => 'CategoryController@index',
    'roles' => ['admin'],
])->middleware('roles');

Route::name('user.')->prefix('user')->group(function () {
    Route::get('/view/{user}', 'HomeController@index')->name('view');
});

Route::name('photo.')->prefix('photo')->group(function () {
    Route::post('/{user}/uploaded/', 'PhotoController@uploaded')->name('uploaded');
    Route::get('/{user}/upload', 'PhotoController@upload')->name('upload');
});

Route::name('chat.')->prefix('chat')->group(function () {
    Route::post('/add', 'ChatController@add')->name('add')->middleware('auth');
});

Route::name('users.')->prefix('users')->group(function () {
    Route::get('/list', 'UserController@list')->name('list');
    Route::get('/view/{user}', 'UserController@view')->name('view');
});

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

