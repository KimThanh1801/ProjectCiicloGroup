<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');
Route::inertia('/register', 'Auth/Register')->name('register');
Route::inertia('/login', 'Auth/Login')->name('login');
