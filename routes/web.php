<?php


Route::get('/', "HomeController@getPosts")->name('home');
Route::post('/post/update/{id}', "PostController@updatePost")->name('post.update');
Route::delete('/post/destroy/{id}', "PostController@deletePost")->name('post.delete');
