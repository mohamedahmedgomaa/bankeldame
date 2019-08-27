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
//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes(['register' => false]);
Route::group(['middleware' => ['auth','auto-check-permission']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('governorate', 'GovernorateController');
    Route::resource('city', 'CityController');
    Route::resource('category', 'CategoryController');
    Route::resource('user', 'UserController');

    Route::post('/changePassword','UserController@changePassword')->name('changePassword');
    Route::get('/getChangePassword','UserController@getChangePassword')->name('getChangePassword');

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
