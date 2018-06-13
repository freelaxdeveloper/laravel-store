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
/* Route::get('/routes', [
    'as' => 'routes',
    'uses' => 'HomeController@routes',
    'roles' => ['admin'],
])->middleware('roles');
 */
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/categories', [
    'as' => 'cat',
    'uses' => 'CategoryController@index',
    'roles' => ['admin'],
])->middleware('roles');

Route::name('user.')->prefix('user')->group(function () {
    Route::get('/view/{user}', 'HomeController@index')->name('view');

    Route::middleware('auth')->group(function () {
        Route::get('/my', 'UserController@my')->name('my');
        Route::name('my.')->prefix('my')->group(function () {
            Route::get('/orders', 'UserController@myOrders')->name('orders');
        });
    });
});

Route::name('photo.')->prefix('photo')->group(function () {
    Route::post('/{user}/uploaded/', 'PhotoController@uploaded')->name('uploaded');
    Route::get('/{user}/upload', 'PhotoController@upload')->name('upload');
});

Route::name('chat.')->prefix('chat')->group(function () {
    Route::post('/add', 'ChatController@add')->name('add')->middleware('auth');
    Route::get('/clear', ['as' => 'clear', 'uses' => 'ChatController@clear', 'roles' => ['admin']])->middleware('roles');
});

Route::name('users.')->prefix('users')->group(function () {
    Route::get('/view/{user}', 'UserController@view')->name('view');
});

Route::group(['middleware' => 'roles', 'namespace' => 'Admin', 'prefix' => 'admin', 'roles' => ['admin']], function() {
    Route::name('admin.')->group(function () {
        Route::get('/', 'AdminController@index')->name('index');
        Route::get('/routes', 'AdminController@routes')->name('routes');
        Route::get('/users/list', 'UserController@list')->name('users-list');
    });    
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
        Route::get('/add/{category}', 'ProductController@add')->name('add');
        Route::post('/add/{category}', 'ProductController@new')->name('new');

        Route::get('/edit/{product}', 'ProductController@edit')->name('edit');
        Route::post('/edit/{product}', 'ProductController@save')->name('save');

        Route::get('/screen/{product}', 'ProductController@screen')->name('screen');
        Route::post('/screen/{product}', 'ProductController@screenSave');
        Route::get('/screen/{product}/{id}/delete', 'ProductController@screenDelete')->name('screenDelete');

        Route::get('/delete/{product}', 'ProductController@delete')->name('delete');
    });
});

Route::name('basket.')->prefix('basket')->group(function () {
    Route::get('/oformit-zakaz', 'BasketController@oformitZakaz')->name('oformit-zakaz');
    Route::post('/oformit-zakaz', 'BasketController@oformitZakazPost');
});

Route::name('forum.')->prefix('forum')->group(function () {

    Route::get('/', [
        'as' => 'index',
        'uses' => 'ForumController@index',
    ]);

    /* Route::group(['middleware' => ['roles'], 'roles' => ['admin']], function () {
        Route::get('/category/{product}', 'ProductController@edit')->name('edit');
        Route::post('/edit/{product}', 'ProductController@save')->name('save');
    }); */
});

