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
Route::post('login','MainController@login')->name('login');
Route::get('state', 'MainController@StateView')->name('state');
Route::get('getstate', 'MainController@getState')->name('getstate');
Route::post('statesave', 'MainController@StateSave')->name('statesave');
Route::get('district', 'MainController@DistrictView')->name('district');
Route::get('getdistrict', 'MainController@getDistrict')->name('getdistrict');
Route::post('districtsave', 'MainController@DistrictSave')->name('districtsave');
Route::get('childist', 'MainController@ChildList')->name('childist');
Route::get('childview', 'MainController@ChildView')->name('childview');
Route::post('childsave', 'MainController@ChildSave')->name('childsave');
Route::get('getchild','MainController@getChildData')->name('getchild');
Route::get('getchild/{id}','MainController@getChildDataByID')->name('getchild/{id}');