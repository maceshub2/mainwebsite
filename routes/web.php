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

// testing cubrid_column_names(req_identifier)



// testing for tayyab bhai

// testing code chaneg git

Route::get('/', 'HomeController@index');
Route::view('/about-us','about-us')->name('about-us');
Route::view('/terms-conditions','terms')->name('terms');
Route::view('/privacy-policy','policy')->name('policy');
Auth::routes();

/*
-------------------------------------------------------------------------
Searching Route
-------------------------------------------------------------------------
*/
Route::prefix('/stocklist')->group(function(){
    Route::get('/','SearchController@index')->name('stocklist_search');
    Route::get('/{id}/maker/{name?}','SearchController@search_by_company')->name('search_by_company');
    Route::get('/price/{min}/{max}','SearchController@search_by_price')->name('search_by_price');
    Route::get('/{id}/type/{name?}','SearchController@search_by_type')->name('search_by_type');
    Route::get('/transmission/{name}','SearchController@search_by_transmission')->name('search_by_transmission');
    Route::get('/steering/{name}','SearchController@search_by_steering')->name('search_by_steering');
    Route::get('/fuel-type/{name}','SearchController@search_by_fuel')->name('search_by_fuel');
    Route::get('/year-from/{from}','SearchController@search_by_year')->name('search_by_years');
    ROute::get('/{id}/section/{name}','SearchController@search_by_section')->name('search_by_section');
});

/*
-------------------------------------------------------------------------
Products & Quote Management at guest side
-------------------------------------------------------------------------
*/
Route::prefix('/product')->group(function(){
    Route::get('/{ref_no}/details','SearchController@showProduct')->name('show.product');
    Route::post('/{ref_no}/quote','QuoteController@store')->name('product.quote');
});

/*
-------------------------------------------------------------------------
Admin Routes
-------------------------------------------------------------------------
*/
Route::prefix('/admin')->group(function(){
    Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login','Auth\LoginController@login')->name('admin.login');

    Route::middleware('auth')->group(function (){
        Route::get('/dashboard','Admin\ProductController@index')->name('admin.dashboard');

        Route::prefix('/products')->group(function(){
            Route::post('additional-price','Admin\ProductController@additionalPrice')->name('admin.additional.price');
            Route::post('additional-options','Admin\ProductController@additionalOption')->name('admin.additional.option');
        });

        Route::prefix('/inquiries')->group(function(){
            Route::get('/','QuoteController@index')->name('admin.quotes');
        });
        Route::prefix('/setting')->group(function (){
            Route::get('/','Admin\SettingController@index')->name('admin.setting.index');
            Route::post('/update','Admin\SettingController@update')->name('admin.setting.update');
            Route::get('/password-reset','Admin\SettingController@showResetPassword')->name('admin.password');
            Route::post('/password-reset/update','Admin\SettingController@passwordUpdate')->name('admin.password.update');
        });
        Route::prefix('/display')->group(function (){
            Route::get('/','Admin\DisplayController@index')->name('admin.display.index');
            Route::post('/update','Admin\DisplayController@update')->name('admin.display.update');
            Route::post('/update/image','Admin\DisplayController@update_image')->name('admin.display.update.image');
        });

        Route::prefix('/product-deals')->group(function(){
            Route::get('/','ProductDealController@index')->name('admin.product.deals');
            Route::post('/store','ProductDealController@store')->name('admin.product.deals.store');
            Route::post('/update','ProductDealController@update')->name('admin.product.deals.update');
            Route::post('/delete','ProductDealController@delete')->name('admin.product.deals.delete');
        });
    });
});

/*
-------------------------------------------------------------------------
Ajax Route
-------------------------------------------------------------------------
*/
Route::prefix('/ajax')->group(function(){
    Route::any('{id}/fetchmodels','AjaxController@fetchModels')->name('ajax.fetch_models');
    Route::any('{id}/fetchPorts','AjaxController@fetchPorts')->name('ajax.fetch_ports');
});

Route::get('/test','TestController@index');
