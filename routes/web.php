<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('guests.login');
});
Route::get('/register', function () {
    return view('guests.register');
});
Route::get('/dashboard', function () {
    return view('shared.dashboard');
});