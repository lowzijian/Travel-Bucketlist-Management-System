<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Login.index');
});

Route::get('/register', function () {
    return view('Register.index');
});


Route::get('/home', function () {
    return view('Users.index');
});

Route::get('/create', function () {
    return view('Users.create');
});

Route::get('/show', function () {
    return view('Users.show');
});
