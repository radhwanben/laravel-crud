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

Route::get('/' , function(){
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('myposts',[
	'uses' =>'PostController@show',
	'as'=>'MyPosts'

]);

Route::get('create',[
	'uses' =>'PostController@create',
	'as'=>'CreatePost',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Author']

]);

Route::post('create',[
	'uses' =>'PostController@store',
	'as'=>'StorePost'

]);

Route::get('/{id}/edit',[
	'uses' =>'PostController@edit',
	'as'=>'EditPost'

]);

Route::put('/{id}/edit',[
	'uses' =>'PostController@update',
	'as'=>'UpdatePost'

]);


Route::delete('/{id}',[

	'uses' => 'PostController@delete',
	'as' =>'DeletePost'
]);


Route::get('/post/{title}',[
	'uses' =>'PostController@GetSinglePost',
	'as'=>'showPost'

]);


Route::get('/author', [
	'uses' => 'HomeController@getAuthorPage',
	'as' => 'author',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Author']
]);




Route::get('project/create',[
	'uses' =>'projectController@create',
	'as'=>'CreateProject'

]);