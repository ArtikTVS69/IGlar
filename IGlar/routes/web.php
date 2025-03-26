<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/profile', function(){
    return view('profile');
})->name('profile');

Route::get('/login', function(){
    return view('login');
})->name('login');
