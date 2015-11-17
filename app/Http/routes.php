<?php

Route::get('/', function () {

    $feedFactory = new \App\FeedFactory();

    return view('home', ['feeds' => $feedFactory->get(30, 'pubDate', 'desc')]);
});
