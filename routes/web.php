<?php

Route::get('/', function(){
    return view('pages.home');
});

Route::resource('poll', 'PollController');

Route::post('/poll/vote', 'PollController@vote');

Route::get('/poll/{slug}/result', 'PollController@result');
