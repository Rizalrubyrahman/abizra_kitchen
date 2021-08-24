<?php

use Illuminate\Support\Facades\Route;

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
//auth
Route::post('/login','AuthController@login');
Route::get('/logout','AuthController@logout');
Route::get('/register','AuthController@viewRegister');
Route::post('/register','AuthController@register');

Route::get('/','HomeController@home');

Route::get('admin/dashboard', 'HomeController@adminHome')->name('admin.home')->middleware('checkRole:admin');


