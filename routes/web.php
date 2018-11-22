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

Route::group([
    'middleware' => ['localization'],
    'prefix'     => LaravelLocalization::setLocale(),
], function() {	

    Route::group([
        'namespace' => 'Auth',
    ], function () {

        // Auth
        Route::get('/',                   'LoginController@login')->name('login');
        Route::post('/',                  'LoginController@loginPost')->name('login.post');
        Route::get('logout',              'LoginController@logout')->name('logout');
        
    });

    // Admin routes
    Route::group([
        'namespace'  => 'Admin',
        'middleware' => ['auth'],
        'prefix'     => 'admin',
        'as'         => 'admin.'
    ], function () {
        // Dashboard
        Route::get('/',              'DashboardController@index')->name('dashboard');

        // Companies
        Route::get('companies/data', 'CompaniesController@data')->name('companies.data');
        Route::resource('companies', 'CompaniesController');

        // Employees
        Route::get('employees/data', 'EmployeesController@data')->name('employees.data');
        Route::resource('employees', 'EmployeesController');

    });
    
});

