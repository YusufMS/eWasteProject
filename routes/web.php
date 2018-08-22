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
Route::get('/messages', 'ChatsController@index');
Route::get('/contactDetails/{id}', 'PostsController@getPublisher')->middleware('auth');
Route::get('regBuyer', ['uses'=>'buyerController@index', 'as'=>'regBuyer']);



//admin's routes,

Route::get('admin', ['uses'=>'AdminController@index','as'=>'adminpage']);
Route::get('adminProfile', ['uses'=>'AdminController@adminProfile','as'=>'adminProfile']);
Route::get('addnews', ['uses'=>'AdminController@addNews','as'=>'addnews']);
Route::get('viewusers', ['uses'=>'AdminController@viewUsers','as'=>'viewusers']);
Route::get('viewbuyers', ['uses'=>'AdminController@viewBuyers','as'=>'viewbuyers']);
Route::get('viewsellers', ['uses'=>'AdminController@viewSellers','as'=>'viewsellers']);
Route::get('addcategory', ['uses'=>'AdminController@addCategory','as'=>'addcategory']);
Route::get('configurations', ['uses'=>'AdminController@configurations','as'=>'configurations']);
Route::post('addsiteinfo',['uses'=>'AdminController@addSiteInformations', 'as'=>'addsiteinfo']);
Route::post('addmaincategory',['uses'=>'AdminController@addMainCategory', 'as'=>'addmaincategory']);
Route::post('addsubcategory',['uses'=>'AdminController@addSubCategory', 'as'=>'addsubcategory']);
Route::get('deleteseller/{id}', ['uses'=>'AdminController@deleteSeller','as'=>'deleteseller']);
Route::get('deletebuyer/{id}', ['uses'=>'AdminController@deleteBuyer','as'=>'deletebuyer']);



Route::get('profile/{id}', 'userprofileController@profileInfo');
Route::get('profile/{id}/edit', 'userprofileController@profileEdit')->middleware('auth');
Route::put('profile/{id}', 'userprofileController@profileUpdate')->name('profileUpdate')->middleware('auth');


Route::get('search-categories/{id}', 'PostsController@category');
Route::get('/showMyPosts', 'PostsController@showMyPosts');
Route::get('/postByCategory/{id}', 'PostsController@postByCategory');
Route::post('comments', 'commentController@store')->middleware('auth');

Route::post('/message/store', 'messageController@store');
Route::post('/rateBuyers/{id}', 'userProfileController@rateBuyers');

Route::post('/signup',['uses'=>'userController@create', 'as'=>'signup']);
Route::post('doLogin', ['uses' => 'userController@doLogin', 'as'=>'doLogin']);
Route::post('createBuyer', ['uses'=>'buyerController@create','as'=>'createBuyer']);
Route::get('/viewUsersByCategory ',['uses'=>'userprofileController@viewUsersByCategory']);
Route::get('/test',function (){
    $notifications = User::find(11)->unreadNotifications;
    foreach ($notifications as $notification) {
        dd($notification);
    }
//    @endforeach
});


Route::resource('/posts', 'PostsController')->middleware('auth');
Route::resource('/wastes', 'subCatController');
Route::resource('/maincat', 'mainCatController');
Route::resource('/complains', 'ComplainController');

Auth ::routes();




