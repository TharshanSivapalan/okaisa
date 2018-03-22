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
Route::post('/', 'AuthController@login');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::get('/password-lost', 'AuthController@passwordLost')->name('password-lost');
//Route::get('/login', 'AuthController@index')->name('login');


/**
 * Inscription
 */
Route::get('/register', 'RegisterController@index')->name('register');
Route::post('/register', 'RegisterController@createAccount');

/**
 *
 */
Route::get('/profile', 'ProfileController@index')->name('profile');

/**
 * Chatbot
 */
Route::get('/assistant', 'ChatbotController@index')->name('assistant');
//Ajax pour le chatbot
Route::get('/ajaxChat', 'ChatbotController@ajax');
