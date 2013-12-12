<?php
// Home
Route::get('/', array
(
	'uses' => 'HomeController@index',
	'as' => 'home'
));

// Sign Up
Route::get('/sign-up', array
(
	'uses' => 'HomeController@sign_up',
	'as' => 'sign-up'
));

Route::post('/sign-up', array
(
	'uses' => 'HomeController@sign_up'
));

// Login
Route::get('/login', array
(
	'uses' => 'HomeController@login',
	'as' => 'login'
));

Route::post('/login', array
(
	'uses' => 'HomeController@login'
));

// Admin
Route::get('/admin', array
(
	'uses' => 'AdminController@index',
	'as' => 'admin'
));

Route::post('/newsletter-submit', array
(
	'uses' => 'HomeController@newsletter_submit'
));

// Dashboard
Route::get('/dashboard', array
(
	'uses' => 'DashboardController@index',
	'as' => 'dashboard'
));