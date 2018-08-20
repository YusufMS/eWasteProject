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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*API calls for Mobile App*/
Route::get('/get_csrf', 'messageController@getCSRF');

Route::post('/MobileAPI/register', 'Auth\RegisterController@register');
Route::post('/MobileAPI/login', 'Auth\LoginController@login');

Route::get('/MobileAPI/get_models', 'messageController@getObjects');

Route::get('/MobileAPI/get_forum_posts', 'messageController@getForumPosts');
Route::get('/MobileAPI/show_forum_post/{id}', 'messageController@showForumPost');