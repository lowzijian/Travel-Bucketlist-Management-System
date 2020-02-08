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

Route::post('/login', 'LoginController@authenticate');

Route::get('/register', 'AdminController@hey');

Route::post('/register', 'Auth\RegisterController@register');


Route::get('/home', 'TravelBucketItemsController@index')->middleware('customAuth');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/create', 'TravelBucketItemsController@create');
Route::post('/create', 'TravelBucketItemsController@store');

Route::get('/show/{id}', 'TravelBucketItemsController@show')->name('travelBucketItem.show');

Route::get('/countries', function () {
    return view('Users.countries');
});


// Route::get('/admin', function () {
//     return view('Admin.index');
// });

Route::get('/admin', 'AdminController@index');
