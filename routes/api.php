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

Route::post('login','UserController@login');

Route::post('register','UserController@register');





    Route::group(['middleware' => 'jwtAuth'], function () {
    Route::post('comment','CommentController@comment');
Route::post('edit','CommentController@edit_comment');
Route::post('getUserData', 'UserController@getUserData');
Route::post('showdata', 'CommentController@show_comment');
Route::post('getcookie','UserController@getcookie');
Route::post('delete_comment', 'CommentController@delete_comment');


    });
    







