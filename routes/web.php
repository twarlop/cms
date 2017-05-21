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

Auth::routes();
Route::get('/user', 'HomeController@user')->middleware(['web']);

Route::get('/', function () {
    return redirect('/admin');
});

//any route prefixed with admin, should load our vue application
Route::group(['prefix' => 'admin'], function(){

    Route::get('/', function(){
        return view('app');
    });

    Route::get('/{any}', function(){
        return view('app');
        //don't define the regex as *, it will fail,
        //laravel wont handle this correctly
    })->where('any', '.+');

});