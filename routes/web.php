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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::post('/signup',[
    'uses'=> 'UserController@postSignUp',
    'as'=>'signup'
]);

Route::post('/signin',[
    'uses'=> 'UserController@postSignIn',
    'as'=>'signin'
]);


Route::get('/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'Logout'
]);
Auth::Routes();

Route::get('/userimage/{filename}', [
    'uses' => 'UserController@getUserImage',
    'as' => 'account.image'
]);

Route::get('/dashboard',[
    'uses'=> 'postController@getDashboard',
    'as'=>'dashboard'
])->middleware('auth');

Route::get('/account', [
    'uses' => 'UserController@getAccount',
    'as' => 'account'
]);

Route::post('/upateaccount', [
    'uses' => 'UserController@postSaveAccount',
    'as' => 'account.save'
]);

Route::post('/createpost', [
    'uses' => 'PostController@postCreatePost',
    'as' => 'post.create'
])->middleware('auth');

Route::get('/delete-post/{post_id}', [
    'uses' => 'PostController@getDeletePost',
    'as' => 'post.delete'
])->middleware('auth');

Route::post('/edit', [
    'uses' => 'PostController@postEditPost',
    'as' => 'edit'
]);

Route::post('/like', [
    'uses' => 'PostController@postLikePost',
    'as' => 'like'
]);
