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

Route::get('/', function () {
    return view('login');
});
Route::get('/test', function () {
    return view('test');
});

Route::get('/comment', function () {
    return view('comment');
});
Route::get('/edit', function () {
    return view('edit');
});
Route::get('/show', function () {
    return view('show');
});
Route::get('/404', function () {
    return view('nofound');
});
Route::get('/reg', function () {
    return view('reg');
});
Route::group(['prefix'=>'mysql'],function(){
    Route::get('/', function () {
        return view('connmysql')  ;
    });
    Route::get('/connmysql', function () {
        return view('connmysql')  ;
    });
    Route::get('/create', function () {
        return view('create');
    });
    Route::get('/read', function () {
        return view('read');
    });    
    Route::get('/update', function () {
        return view('update');
    }); 

});







