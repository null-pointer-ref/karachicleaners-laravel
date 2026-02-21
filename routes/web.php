<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home'); // loads resources/views/home.blade.php
});

Route::get('/about', function () {
    return view('about'); // loads about.blade.php
});

Route::get('/services', function () {
    return view('services'); // loads services.blade.php
});

Route::get('/gallery', function () {
    return view('gallery'); 
});

Route::get('/contact', function () {
    return view('contact');
});