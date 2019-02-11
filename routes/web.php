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

Route::resource('/','IndexController');


Route::group(['prefix' => 'admin','middleware' => 'auth'],function (){
    Route::get('/',['uses' => 'IndexController@execute','as' => 'adminPage']);
    Route::post('/',['uses' => 'IndexController@search','as' => 'adminPage']);

    // admin/edit
    Route::get('/edit/{id}',['uses' => 'AdminController@show','as' => 'adminEdit']);
    Route::post('/edit',['uses' => 'AdminController@store','as' => 'adminEdit']);
    //admin/delete/data
    Route::post('/delete/data/{id}',['uses' => 'AdminController@delete','as' => 'adminDelete']);




});





Auth::routes();


//Route::get('/home', 'HomeController@index')->name('home');
