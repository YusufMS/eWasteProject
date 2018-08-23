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



//admin's routes,

Route::get('admin', ['uses'=>'AdminController@chartUsers','as'=>'adminpage']);
Route::get('adminProfile', ['uses'=>'AdminController@adminProfile','as'=>'adminProfile']);
Route::get('viewnews', ['uses'=>'AdminController@viewNews','as'=>'viewnews']);
Route::get('viewusers', ['uses'=>'AdminController@viewUsers','as'=>'viewusers']);
Route::get('viewbuyers', ['uses'=>'AdminController@viewBuyers','as'=>'viewbuyers']);
Route::get('viewsellers', ['uses'=>'AdminController@viewSellers','as'=>'viewsellers']);
Route::get('viewreportedposts', ['uses'=>'AdminController@viewReportedPosts','as'=>'viewreportedposts']);
Route::get('viewadminposts', ['uses'=>'AdminController@viewPosts','as'=>'viewadminposts']);
Route::get('configurations', ['uses'=>'AdminController@configurations','as'=>'configurations']);


Route::post('subcategorydelete/{id}', ['uses'=>'AdminController@viewSubCategoryToDelete','as'=>'subcategorydelete']);
Route::get('addcategory', ['uses'=>'AdminController@addCategory','as'=>'addcategory']);
Route::get('configurations', ['uses'=>'AdminController@configurations','as'=>'configurations']);
Route::post('addsiteinfo',['uses'=>'AdminController@addSiteInformations', 'as'=>'addsiteinfo']);
Route::put('updatesiteinfo{id}',['uses'=>'AdminController@updateSiteInformations', 'as'=>'updatesiteinfo']);
Route::post('addmaincategory',['uses'=>'AdminController@addMainCategory', 'as'=>'addmaincategory']);
Route::post('addsubcategory',['uses'=>'AdminController@addSubCategory', 'as'=>'addsubcategory']);
Route::get('deleteseller/{id}', ['uses'=>'AdminController@deleteSeller','as'=>'deleteseller']);
Route::get('deletebuyer/{id}', ['uses'=>'AdminController@deleteBuyer','as'=>'deletebuyer']);
Route::get('deletenews/{id}', ['uses'=>'AdminController@deleteNews','as'=>'deletenews']);
Route::get('deletemaincategory/{id}', ['uses'=>'AdminController@deleteMainWasteCategory','as'=>'deletemaincategory']);
Route::get('deletesubcategory/{id}', ['uses'=>'AdminController@deleteSubWasteCategory','as'=>'deletesubcategory']);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////


Route::get('profile/{id}', 'userprofileController@profileInfo');
Route::get('profile/{id}/edit', 'userprofileController@profileEdit')->middleware('auth');
Route::put('profile/{id}', 'userprofileController@profileUpdate')->name('profileUpdate')->middleware('auth');


Route::get('search-categories/{id}', 'PostsController@category');
Route::get('/showMyPosts/{id}', 'PostsController@showMyPosts');
Route::get('/postByCategory/{id}', 'PostsController@postByCategory');
Route::resource('comments', 'CommentController')->middleware('auth');




Route::post('/signup',['uses'=>'userController@create', 'as'=>'signup']);
Route::post('/messages', 'ChatsController@sendMessage');
Route::post('doLogin', ['uses' => 'userController@doLogin', 'as'=>'doLogin']);
Route::post('createBuyer', ['uses'=>'buyerController@create','as'=>'createBuyer']);




Route::resource('/chat', 'chatsController')->middleware('auth');
Route::resource('/posts', 'PostsController')->middleware('auth');
Route::resource('/wastes', 'subCatController');
Route::resource('/maincat', 'mainCatController');
Route::resource('/complains', 'ComplainController');

Auth ::routes();




