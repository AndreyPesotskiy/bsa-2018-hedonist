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

Route::prefix('v1')->group(function () {
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::prefix('review')->group(function () {

        Route::get('/', 'ReviewController@getReviewCollection');

        Route::post('/', 'ReviewController@createReview');

        Route::get('{id}', 'ReviewController@getReview');

        Route::post('{id}', 'ReviewController@editReview');

        Route::delete('/', 'ReviewController@deleteReview');
    });
});