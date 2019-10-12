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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//

Auth::routes(['register' => false]);
Route::group(['middleware' => ['auth', 'auto-check-permission'], 'prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('governorate', 'GovernorateController');
    Route::resource('city', 'CityController');
    Route::resource('category', 'CategoryController');
    Route::resource('user', 'UserController');

    Route::post('/changePassword', 'UserController@changePassword')->name('changePassword');
    Route::get('/getChangePassword', 'UserController@getChangePassword')->name('getChangePassword');

    Route::resource('post', 'PostController');
    Route::resource('role', 'RoleController');
    Route::resource('donation', 'DonationController');

    Route::get('/settings', 'SettingController@index')->name('settings');
    Route::post('/settings/update', 'SettingController@update')->name('settings.update');

    Route::get('contact', 'ContactController@index')->name('contact.index');
    Route::delete('contact/{id}', 'ContactController@destroy')->name('contact.destroy');

    Route::get('client', 'ClientController@index')->name('client.index');
    Route::delete('client/{id}', 'ClientController@destroy')->name('client.destroy');
    Route::put('is_active/{id}', 'ClientController@is_active')->name('client.is_active');
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////  Web Site //////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////


Route::group(['namespace' => 'WebSite'], function () {

    Route::group(['prefix' => 'client'], function () {
//        Route::post('/login', 'AuthController@login')->name('auth.login');

        Route::get('/register', 'AuthController@register')->name('auth.register');
        Route::post('/register-client', 'AuthController@registerClient')->name('auth.registerClient');
        Route::get('/reset', 'AuthController@reset')->name('auth.reset');
        Route::post('/reset-password', 'AuthController@resetPassword')->name('auth.resetPassword');
        Route::get('/new-password', 'AuthController@newPassword')->name('auth.newPassword');
        Route::post('/new-password', 'AuthController@postNewPassword')->name('auth.postNewPassword');

        Route::get('/login', 'AuthController@getLogin')->name('auth.getLogin');
        Route::post('/main/checklogin', 'AuthController@checklogin');
        Route::get('/logout', 'AuthController@logout');

        Route::group(['middleware' => 'auth:client'],function() {
            Route::get('/howWeAre', 'WelcomeController@howWeAre')->name('welcome.howWeAre');
            Route::get('/articles', 'WelcomeController@articles')->name('welcome.articles');
            Route::get('/article/{id}', 'WelcomeController@article')->name('welcome.article');
            Route::get('/donations', 'WelcomeController@donations')->name('welcome.donations');
            Route::get('/donations-details/{id}', 'WelcomeController@donationDetails')->name('welcome.donationDetails');
            Route::get('/contact', 'WelcomeController@contact')->name('welcome.contact');
            Route::post('/postContact', 'WelcomeController@postContact')->name('welcome.postContact');
            Route::get('/donation-request', 'WelcomeController@donationRequest')->name('welcome.donationRequest');
            Route::post('/create-donation-request', 'WelcomeController@createDonationRequest')->name('welcome.createDonationRequest');
            Route::post('/fav', 'WelcomeController@fav')->name('welcome.fav');
        });
    });
    Route::group(['middleware' => 'auth:client'],function() {
        Route::get('/', 'WelcomeController@index')->name('welcome.index');
    });

});