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

Route::pattern("id", "[0-9]+");
Route::get("/", "CoursesController@index")->name("home");

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::get("login", "Auth\LoginController@showLoginForm")->name("login");
Route::post("login", "Auth\LoginController@login");
Route::post("logout", "Auth\LoginController@logout")->name("logout");

/*
|--------------------------------------------------------------------------
| Activities Routes
|--------------------------------------------------------------------------
*/
Route::prefix("activities")->group(function () {
    Route::get("/{id}", "ActivitiesController@show")
        ->name("activities.show");
});

/*
|--------------------------------------------------------------------------
| Activity Routes
|--------------------------------------------------------------------------
*/
Route::prefix("activity")->group(function () {
    Route::get("/{id}", "ActivityController@show")
        ->name("activity.show");

    Route::get("/{id}/descargar", "ActivityController@download")
        ->name("activity.download");
});

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/
Route::prefix("user")->group(function () {
    Route::middleware("auth")->group(function () {
        Route::get("/dashboard", "UsersController@showDashboard")
            ->name("user.dashboard");

        // Activity Routes
        Route::prefix("actividad")->group(function () {
            Route::get("/crear", "ActivityController@new")
                ->name("user.activity.new");

            Route::post("/crear", "ActivityController@store")
                ->name("user.activity.store");

            Route::get("/{id}/editar", "ActivityController@edit")
                ->name("user.activity.edit");

            Route::post("/{id}/editar", "ActivityController@update")
                ->name("user.activity.update");

            Route::post("/{id}/eliminar", "ActivityController@destroy")
                ->name("user.activity.delete");
        });

        // Activities Routes
        Route::prefix("actividades")->group(function () {
            Route::get("/", "ActivitiesController@userIndex")
                ->name("user.activities.index");
        });

        /**
         * Admin Routes
         */
        Route::middleware("isAdmin")->group(function () {
            // Users Routes
            Route::prefix("usuarios")->group(function () {
                Route::get("/", "UsersController@index")
                    ->name("user.users.index");

                Route::get("/crear", "UsersController@new")
                    ->name("user.users.new");

                Route::post("/crear", "UsersController@store")
                    ->name("user.users.store");

                Route::get("/{id}/editar", "UsersController@edit")
                    ->name("user.users.edit");

                Route::post("/{id}/editar", "UsersController@update")
                    ->name("user.users.update");

                Route::post("/{id}/eliminar", "UsersController@destroy")
                    ->name("user.users.delete");
            });

            // Courses Routes
            Route::prefix("cursos")->group(function () {
                Route::get("/", "CoursesController@userIndex")
                    ->name("user.courses.index");

                Route::get("/crear", "CoursesController@new")
                    ->name("user.courses.new");

                Route::post("/crear", "CoursesController@store")
                    ->name("user.courses.store");

                Route::get("/{id}/editar", "CoursesController@edit")
                    ->name("user.courses.edit");

                Route::post("/{id}/editar", "CoursesController@update")
                    ->name("user.courses.update");

                Route::post("/{id}/eliminar", "CoursesController@destroy")
                    ->name("user.courses.delete");
            });

            // Departments Routes
            Route::prefix("departamentos")->group(function () {
                Route::get("/", "DepartmentsController@index")
                    ->name("user.departments.index");

                Route::get("/crear", "DepartmentsController@new")
                    ->name("user.departments.new");

                Route::post("/crear", "DepartmentsController@store")
                    ->name("user.departments.store");

                Route::get("/{id}/editar", "DepartmentsController@edit")
                    ->name("user.departments.edit");

                Route::post("/{id}/editar", "DepartmentsController@update")
                    ->name("user.departments.update");

                Route::post("/{id}/eliminar", "DepartmentsController@destroy")
                    ->name("user.departments.delete");
            });
        });
    });
});
