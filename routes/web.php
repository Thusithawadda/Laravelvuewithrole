<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Controllers;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('user', '\App\Http\Controllers\UserController');
    Route::resource('country', '\App\Http\Controllers\CountriesController');
    Route::post('country/{id}/update', [App\Http\Controllers\CountriesController::class, 'update'])->name('updateCountry');
    Route::get('country/{id}/delete', [App\Http\Controllers\CountriesController::class, 'destroy'])->name('deleteCountry');
    Route::get('country/search', [App\Http\Controllers\CountriesController::class, 'search'])->name('searchCountry');

    Route::resource('department','\App\Http\Controllers\DepartmentController');
//    Route::get('/department', [App\Http\Controllers\DepartmentController::class, 'index'])->name('indexDepartment');
//    Route::get('/department/{id}/update', [App\Http\Controllers\DepartmentController::class, 'update'])->name('updateDepartment');
//    Route::get('/department/create', [App\Http\Controllers\DepartmentController::class, 'create'])->name('createDepartment');
    Route::get('/department/{id}/update', [App\Http\Controllers\DepartmentController::class, 'update'])->name('updateDepartment');
    Route::get('/department/{id}/delete', [App\Http\Controllers\DepartmentController::class, 'destroy'])->name('deleteDepartment');

    Route::resource('state','\App\Http\Controllers\StateController');
    Route::get('state/{id}/update', [App\Http\Controllers\StateController::class, 'update'])->name('updateState');
    Route::get('state/{id}/delete', [App\Http\Controllers\StateController::class, 'destroy'])->name('deleteState');

    Route::resource('city','\App\Http\Controllers\CityController');
    Route::get('city/{id}/update', [App\Http\Controllers\CityController::class, 'update'])->name('updateCity');
    Route::get('city/{id}/delete', [App\Http\Controllers\CityController::class, 'destroy'])->name('deleteCity');

    Route::resource('employee','\App\Http\Controllers\EmployeeController');
    Route::get('employee/{id}/update', [App\Http\Controllers\EmployeeController::class, 'update'])->name('updateEmployee');
    Route::get('employee/{id}/delete', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('deleteEmployee');

    Route::resource('permission', '\App\Http\Controllers\PermissionController');

    Route::get('/password/change', '\App\Http\Controllers\UserController@getPassword')->name('userGetPassword');

    Route::post('/password/change', '\App\Http\Controllers\UserController@postPassword')->name('userPostPassword');
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['auth', 'role_or_permission:admin|create role|create permission']], function() {

    Route::resource('role', '\App\Http\Controllers\RoleController');

});


// axios request
Route::get('/getAllPermission', '\App\Http\Controllers\PermissionController@getAllPermissions');
Route::post("/postRole", "\App\Http\Controllers\RoleController@store");
Route::get("/getAllUsers", "\App\Http\Controllers\UserController@getAll");
Route::get("/getAllRoles", "\App\Http\Controllers\RoleController@getAll");
Route::get("/getAllPermissions", "\App\Http\Controllers\PermissionController@getAll");

// axios create user
Route::post('/account/create', '\App\Http\Controllers\UserController@store');
Route::put('/account/update/{id}', '\App\Http\Controllers\UserController@update');
Route::delete('/delete/user/{id}', '\App\Http\Controllers\UserController@delete');
Route::get('/search/user', '\App\Http\Controllers\UserController@search');
