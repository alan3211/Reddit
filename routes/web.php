<?php

// CRUD de operaciones
Auth::routes();

Route::group(['middleware' => 'auth'],function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/posts/create','PostsController@create')->name('create_post_path');
	Route::post('/posts','PostsController@store')->name('store_post_path');
	Route::get('/posts/{post}/edit','PostsController@edit')->name('edit_post_path');
	Route::put('/posts/{post}','PostsController@update')->name('update_post_path');
	Route::delete('/posts/{post}','PostsController@delete')->name('delete_post_path');
});

Route::get('/','PostsController@index');
Route::get('/posts','PostsController@index')->name('posts_path');
Route::get('/posts/{post}','PostsController@show')->name('post_path');