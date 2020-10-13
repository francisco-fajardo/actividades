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
    Route::get('/{id}', 'CoursesController@show')->name('courses.show');
});

/*
|--------------------------------------------------------------------------
| Activities Routes
|--------------------------------------------------------------------------
*/
Route::prefix('activities')->group(function () {
    Route::get('/', 'ActivitiesController@index')->name('activities.index');
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
            Route::get('/new', 'ActivityController@showStoreForm')->name('user.activity.storeForm');
            Route::post('/new', 'ActivityController@store')->name('user.activity.store');
        });

        // Activities Routes
        Route::prefix('activities')->group(function () {
            Route::get('/', 'ActivitiesController@userIndex')->name('user.activities');
        });

        /**
         * Admin Routes
         */
        Route::middleware('isAdmin')->group(function () {
            // Users Routes
            Route::prefix('users')->group(function () {
                Route::get('/', 'UsersController@index')->name('user.users.index');
                Route::get('/{id}', 'UsersController@show')->name('user.users.show');
            });

            // Courses Routes
            Route::prefix('courses')->group(function () {
                Route::get('/', 'CoursesController@userIndex')->name('user.courses.index');
            });
        });
    });
});
