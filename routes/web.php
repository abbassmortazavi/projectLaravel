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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'laravel-crud'] , function (){
    Route::get('/', 'CrudController@index');
    Route::match(['get', 'post'], 'create', 'CrudController@create');
    Route::match(['get', 'put'], 'update/{id}', 'CrudController@update');
    Route::delete('delete/{id}', 'CrudController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
