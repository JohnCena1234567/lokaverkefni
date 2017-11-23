<?php

Auth::routes();

Route::get('/', function() {
	return redirect('/threads');
});

Route::get('/home', function() {
	return redirect('/threads');
});

Route::get('/threads', 'ThreadsController@index');
Route::post('/threads', 'ThreadsController@store');
Route::get('/threads/create', 'ThreadsController@create');
Route::get('/threads/{id}', 'ThreadsController@show');
Route::post('/threads/{id}/delete', 'ThreadsController@delete');
Route::post('/threads/{id}/edit', 'ThreadsController@edit');

Route::get('/unlike/{thread}', 'LikeController@unLike');
Route::get('/like/{thread}', 'LikeController@like');

Route::post('/comment/{id}', 'CommentController@store');
Route::post('/comment/reply/{id}', 'CommentController@storeReply');

Route::get('/profile/mythread/{id}', 'ProfileController@edit');
Route::get('/profile/mythreads', 'ProfileController@show');
Route::get('/profile/{id}', 'ProfileController@index');

