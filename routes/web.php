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





Route::group(
    [
        #translation
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {



        Route::group(['middleware' => ['guest']], function () {

            // Authentication Routes...
            Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
            Route::post('login', 'Auth\LoginController@login');

        });

        Route::group(['middleware' => ['auth']], function () {

            Route::post('logout', 'Auth\LoginController@logout')->name('logout');
            Route::get('/', 'HomeController@index')->name('home');



            // companies group
            Route::group(['prefix' => 'companies'], function () {
                # companies index
                Route::get('/', [
                    'uses' => 'CompaniesController@index',
                    'as' => 'companies',
                    'title' => ' ',
                ]);


                Route::get('/branches', [
                    'uses' => 'CompaniesController@indexBranches',
                    'as' => 'indexBranches',
                    'title' => ' ',
                ]);


                # companies add
                Route::get('create', [
                    'uses' => "CompaniesController@create",
                    'as' => 'addcompany',
                    'title' => '  ',
                ]);

                # companies postadd
                Route::post('post-device', [
                    'uses' => 'CompaniesController@store',
                    'as' => 'postaddcompany',
                    'title' => '  ',
                ]);

                # companies update
                Route::get('/edit/{id}', [
                    'uses' => 'CompaniesController@edit',
                    'as' => 'getupdatecompany',
                    'title' => '  ',
                ]);

                # companies postupdate
                Route::post('update/{id}', [
                    'uses' => 'CompaniesController@update',
                    'as' => 'postupdatecompany',
                    'title' => '  ',
                ]);

                # companies delete
                Route::get('/delete/{id}', [
                    'uses' => 'CompaniesController@destroy',
                    'as' => 'destroycompany',
                    'title' => '  ',
                ]);


            });



            // Route for view/blade file.
            Route::get('importExport', 'MaatwebsiteController@importExport')->name('importExport');
            // Route for export/download tabledata to .csv, .xls or .xlsx
            Route::get('downloadExcel/{type}', 'MaatwebsiteController@downloadExcel');
            // Route for import excel data to database.
            Route::post('importExcel', 'MaatwebsiteController@importExcel')->name('importExcel');


        });

    });
