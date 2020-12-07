<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/create','CustomerController@create');
Route::get('/index','CustomerController@index');
Route::delete('/destroy/{id}','CustomerController@destroy');
Route::get('/edit/{id}','CustomerController@edit');
Route::put('/update/{id}','CustomerController@update');
Route::put('/profile/','CustomerController@profile');

Route::post('/profile/create','ProfileController@create');
// Route::get('/index','ProfileController@index');
Route::get('/profile/edit/{id}','ProfileController@edit');
Route::put('/profile/update/{id}','ProfileController@update');
Route::put('/profile/','ProfileController@profile');
