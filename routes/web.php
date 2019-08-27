<?php

Auth::routes();


Route::get('/', 'GuestController@home')->name('home');


Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/create', 'PostController@create')->name('posts.create');
Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
Route::patch('/posts/{post}', 'PostController@update')->name('posts.update');
Route::get('/posts/trash', 'PostController@trash')->name('posts.trash');
Route::get('/posts/trash/{post}/restore', 'PostController@restore')->name('posts.restore');
Route::post('/posts/{post}/delete', 'PostController@delete')->name('posts.destroy');
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
Route::post('/posts', 'PostController@store')->name('post.store');


Route::resource('volunteering', 'VolunteeringController');