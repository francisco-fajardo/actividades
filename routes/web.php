<?php

use Illuminate\Support\Facades\Route;

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

Route::pattern('id', '[0-9]+');
Route::get('/', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

/*
|--------------------------------------------------------------------------
| Courses Routes
|--------------------------------------------------------------------------
*/
Route::prefix('courses')->group(function () {
    Route::get('/', 'CoursesController@index')->name('courses.index');
});

/*
|--------------------------------------------------------------------------
| Activities Routes
|--------------------------------------------------------------------------
*/
Route::prefix('activities')->group(function () {
    Route::get('/{id}', 'ActivitiesController@show')->name('activities.show');
});

/*
|--------------------------------------------------------------------------
| Activity Routes
|--------------------------------------------------------------------------
*/
Route::prefix('activity')->group(function () {
    Route::get('/{id}', 'ActivityController@show')->name('activity.show');
});

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/
Route::prefix('user')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', 'UsersController@showDashboard')->name('user.dashboard');

        // Activity Routes
        Route::prefix('activity')->group(function () {
            Route::get('/new', 'ActivityController@new')->name('user.activity.new');
            Route::post('/new', 'ActivityController@store')->name('user.activity.store');
            Route::get('/{id}/edit', 'ActivityController@edit')->name('user.activity.edit');
            Route::post('/{id}/edit', 'ActivityController@update')->name('user.activity.update');
            Route::post('/{id}/delete', 'ActivityController@destroy')->name('user.activity.delete');
            Route::post('/upload', 'UploadController@upload')->name('user.activity.upload');
        });

        // Activities Routes
        Route::prefix('activities')->group(function () {
            Route::get('/', 'ActivitiesController@userIndex')->name('user.activities.index');
        });

        /**
         * Admin Routes
         */
        Route::middleware('isAdmin')->group(function () {
            // Users Routes
            Route::prefix('users')->group(function () {
                Route::get('/', 'UsersController@index')->name('user.users.index');
                Route::get('/new', 'UsersController@new')->name('user.users.new');
                Route::post('/new', 'UsersController@store')->name('user.users.store');
                Route::get('/{id}/edit', 'UsersController@edit')->name('user.users.edit');
                Route::put('/{id}/edit', 'UsersController@update')->name('user.users.update');
            });

            // Courses Routes
            Route::prefix('courses')->group(function () {
                Route::get('/', 'CoursesController@userIndex')->name('user.courses.index');
            });
        });
    });
});
