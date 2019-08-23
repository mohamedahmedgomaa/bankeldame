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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace'=>'Api'], function() {

    // Main Controller

    Route::get('governorates', 'MainController@governorates');
    Route::get('cities', 'MainController@cities');
    Route::get('settings', 'MainController@settings');

    // Auth Controller

    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('resetPassword', 'AuthController@resetPassword');
    Route::post('newPassword', 'AuthController@newPassword');


    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('searchCategory', 'MainController@searchCategory');
        Route::post('post', 'MainController@post');
        Route::post('posts', 'MainController@posts');
        Route::post('profileEdit', 'MainController@profileEdit');
        Route::post('contactUs', 'MainController@contactUs');
        Route::get('categories', 'MainController@categories');
        Route::get('notifications', 'MainController@notifications');
        Route::post('donationRequest', 'MainController@donationRequest');
        Route::get('donationRequests', 'MainController@donationRequests');

        Route::post('createDonationRequests', 'MainController@createDonationRequests');

        Route::get('getNotificationSettings', 'MainController@getNotificationSettings');
        Route::post('updateNotificationSettings', 'MainController@updateNotificationSettings');
        Route::get('favourites', 'MainController@favourites');
        Route::post('toggleFavourites', 'MainController@toggleFavourites');

        Route::post('register-token', 'AuthController@registerToken');
        Route::post('remove-token', 'AuthController@removeToken');


    });

});
