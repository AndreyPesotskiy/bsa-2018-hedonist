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
    Route::group(['prefix' => '/auth', 'namespace' => 'Api'], function() {

        Route::post('/signup','AuthController@register');

        Route::post('/login','AuthController@login');

        Route::post('/logout','AuthController@logout');

        Route::post('/reset','AuthController@resetPassword');

        Route::post('/recover','AuthCOntroller@recoverPassword');

        Route::group(['middleware' => 'jwt.auth'], function() {

            Route::post('/refresh', 'AuthController@refresh');

            Route::get('/me', 'AuthController@me');
        });
    });

    Route::group(['middleware' => 'jwt.auth'], function() {

        Route::prefix('review')->group(function () {

            Route::get('/', 'ReviewController@getReviewCollection');

            Route::post('/', 'ReviewController@createReview');

            Route::get('/{id}', 'ReviewController@getReview');

            Route::put('/{id}', 'ReviewController@updateReview');

            Route::delete('/{id}', 'ReviewController@deleteReview');
        });
      
        Route::get('/places/features/', 'Api\Places\PlaceFeaturesController@indexPlaceFeature')
            ->name('place.features.indexFeature');

        Route::post('/places/features', 'Api\Places\PlaceFeaturesController@storePlaceFeature')
            ->name('place.features.storeFeature');

        Route::get('/places/features/{id}', 'Api\Places\PlaceFeaturesController@showPlaceFeature')
            ->name('place.features.showFeature');

        Route::delete('/places/features/{id}', 'Api\Places\PlaceFeaturesController@destroyPlaceFeature')
            ->name('place.features.deleteFeature');
      
        /* Routes here.. */
    });
});
