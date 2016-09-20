<?php

Route::get('/', function(){
    return view('pages.home');
});

Route::get('/home', 'HomeController@index');

Route::resource('poll', 'PollController');

Route::post('/poll/vote', 'PollController@vote')->middleware('check_ip');

Route::get('/poll/{slug}/result', 'PollController@result');


Auth::routes();
Route::get('/auth/facebook', 'Auth\OAuthController@redirectToProvider');
Route::get('/auth/facebook/callback', 'Auth\OAuthController@handleProviderCallback');
