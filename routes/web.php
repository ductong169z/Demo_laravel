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

Route::get('/', 'PostsController@categories' );
Route::get('/cate/{cate_id}', 'PostsController@news' );


Route::get('/posts/create','PostsController@create');
Route::get('/posts/{id}/edit','PostsController@edit');

Route::post('postscreate','PostsController@store')->name('create');
Route::any('postsedit/{id}','PostsController@update')->name('edit');
Route::any('del/{id}','PostsController@destroy')->name('del');
Route::get('/loadfilm/{id}','loadfilmcontroller@show');

//Route::resource('posts','PostsController');
Route::get('/cate/{cate_id}/{posts}/{id}','PostsController@show');
Route::post('delmultiple','Postscontroller@multipledel');


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/categories', 'DashboardController@categories')->name('categories');
Route::get('/test', function (){
        return App\Post::with('childs')->where('cate_id','0')->get();
} );

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
