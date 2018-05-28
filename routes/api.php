<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/basket/{view?}', 'ApiController@basket')->name('basket');
Route::post('/basket', 'ApiController@basketPush');
Route::post('/basketClear', 'ApiController@basketClear')->name('basketClear')->middleware('csrf');

/* Route::get('/basket', function () {
    return response()->json([45], 403);
}); */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
