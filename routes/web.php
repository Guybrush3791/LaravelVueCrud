<?php


Route::get('/', "HomeController@getPosts")->name('home');
Route::post('/post/update/{id}', "HomeController@updatePost")->name('post.update');
Route::delete('/post/destroy/{id}', "HomeController@deletePost")->name('post.delete');
