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
if ( env('SSL', false) ) {
    URL::forceScheme('https');
}

Route::get('/test', 'ApiController@test')->name('test');

Route::get('/agreement/{view?}', 'ApiController@agreement')->name('agreement');
Route::get('/basket/{view?}', 'ApiController@basket')->name('basket');
Route::post('/basket', 'ApiController@basketPush');
Route::post('/basketClear', 'ApiController@basketClear')->name('basketClear')->middleware('csrf');
Route::post('/basket/delete', 'ApiController@basketDelete')->name('basketDelete')->middleware('csrf');

Route::name('np.')->prefix('np')->group(function () {
    Route::post('/cities', 'ApiController@cities')->name('cities')->middleware('csrf');
    Route::post('/offices', 'ApiController@offices')->name('offices')->middleware('csrf');
});

Route::post('/sms/code', 'ApiController@smsCode')->name('smsCode')->middleware('csrf', 'throttle:10,1');

/* Route::get('/basket', function () {
    return response()->json([45], 403);
}); */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
