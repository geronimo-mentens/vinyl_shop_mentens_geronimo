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


Route::view('/', 'home');
Route::get('shop', 'ShopController@index');
Route::get('shop_alt', 'ShopController@index_alt');
Route::get('shop/{id}', 'ShopController@show');
Route::redirect('admin', 'records');
Route::get('contact-us', 'ContactUsController@show');
Route::post('contact-us', 'ContactUsController@sendEmail');


Route::view('contact-us','contact');


Auth::routes();
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::redirect('/', 'records');
    Route::get('genres/qryGenres', 'Admin\GenreController@qyrGenres');
    Route::resource('genres', 'Admin\GenreController');
    Route::resource('records', 'Admin\RecordController');
    Route::get('records', 'Admin\RecordController@index');
    Route::get('users/qyrUsers', 'Admin\UserController@qyrUsers');
    Route::resource('users', 'Admin\UserController');
    });
// Route::get('/home', 'HomeController@index')->name('home');
Route::view('/', 'home');

Route::redirect('user', '/user/profile');
Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('profile', 'User\ProfileController@edit');
    Route::post('profile', 'User\ProfileController@update');
    Route::get('password', 'User\PasswordController@edit');
    Route::post('password', 'User\PasswordController@update');
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');



