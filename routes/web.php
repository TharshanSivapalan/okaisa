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

/**
 * Accueil
 */
Route::get('/', 'WelcomeController@index')->name('welcome');

/**
 * Authentification
 */
Route::get('/login', 'AuthController@index')->name('login');
Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout')->name('logout');

/**
 * Inscription
 */
Route::get('/register', 'RegisterController@index')->name('register');
Route::post('/register', 'RegisterController@createAccount');