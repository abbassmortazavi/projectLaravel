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

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('post/{id}' , 'AdminPostController@post')->name('home.post');

Route::group(['middleware'=>'admin'] , function (){
    Route::get('admin', function () {
        return view('admin.index');
    });
    Route::resource('admin/users' , 'AdminUserController');
    Route::resource('admin/posts' , 'AdminPostController');
    Route::resource('admin/cats' , 'AdminCategoryController');
    Route::resource('admin/photos' , 'AdminPhotoController');
    Route::resource('admin/comments' , 'PostCommentController');
    Route::resource('admin/comment/replies' , 'CommentRepliesController');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
