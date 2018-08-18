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

Route::get('/', 'HomeController@guestIndex')->name('guestHome');

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/buyerHome', 'HomeController@buyerIndex')->name('buyerHome')->middleware('auth');
Route::get('/sellerHome', 'HomeController@sellerIndex')->name('sellerHome')->middleware('auth');
Route::get('/register',['uses'=>'userController@index']);
Route::get('/login',['uses'=>'userController@login']);
Route::get('/messages', 'ChatsController@fetchMessages');
Route::get('/contactDetails/{id}', 'PostsController@getPublisher')->middleware('auth');
Route::get('regBuyer', ['uses'=>'buyerController@index', 'as'=>'regBuyer']);
Route::get('admin', ['uses'=>'AdminController@index','as'=>'adminpage']);
Route::get('adminProfile', ['uses'=>'AdminController@adminProfile','as'=>'adminProfile']);
Route::get('addnews', ['uses'=>'AdminController@addNews','as'=>'addnews']);
Route::get('viewusers', ['uses'=>'AdminController@viewUsers','as'=>'viewusers']);
Route::get('viewbuyers', ['uses'=>'AdminController@viewBuyers','as'=>'viewbuyers']);
Route::get('viewsellers', ['uses'=>'AdminController@viewSellers','as'=>'viewsellers']);
Route::get('profile/{id}', 'userprofileController@profileInfo');
Route::get('profile/{id}/edit', 'userprofileController@profileEdit')->middleware('auth');
Route::put('profile/{id}', 'userprofileController@profileUpdate')->name('profileUpdate')->middleware('auth');


Route::get('search-categories/{id}', 'PostsController@category');
Route::get('/showMyPosts/{id}', 'PostsController@showMyPosts');

Route::resource('comments', 'CommentController')->middleware('auth');




Route::post('/signup',['uses'=>'userController@create', 'as'=>'signup']);
Route::post('/messages', 'ChatsController@sendMessage');
Route::post('doLogin', ['uses' => 'userController@doLogin', 'as'=>'doLogin']);
Route::post('createBuyer', ['uses'=>'buyerController@create','as'=>'createBuyer']);




Route::resource('/chat', 'chatsController')->middleware('auth');
Route::resource('/posts', 'PostsController')->middleware('auth');
Route::resource('/wastes', 'subCatController');
Route::resource('/maincat', 'mainCatController');
Auth ::routes();




