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

// Log out
Route::get('/log-out', array
(
	'uses' => 'HomeController@log_out',
	'as' => 'log-out'
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

// Dashboard: Inbox
Route::get('/dashboard/inbox', array
(
	'uses' => 'DashboardController@inbox',
	'as' => 'dashboard/inbox'
));

// Dashboard: Settings
Route::get('/dashboard/settings', array
(
	'uses' => 'DashboardController@settings',
	'as' => 'dashboard/settings'
));

// Dashboard: Settings (POST)
Route::post('/dashboard/settings', array
(
	'uses' => 'DashboardController@settings'
));

// E-mail
Route::get('/email/{name}', array
(
	'uses' => 'EmailController@view'
))->where('name', '[a-z0-9_]+');

Event::listen('illuminate.query', function($query)
{
	if ( app()->environment() === 'local' && Input::get('profiler') )
	{
		echo $query, '<hr>';
		exit;
	}
});

// Public profile page
Route::get('/profile/{username}', array
(
	'uses' => 'ProfileController@public_profile'
))->where('username', '[a-z0-9_\-]+');

// User profile picture
Route::get('/profile-picture/{id}/{size_name}', array
(
	'uses' => 'ImageController@profile_picture'
))->where(array('id', '\d+'), array('size_name', '[a-z0-9_\-]+'));

// Crop profile picture (POST)
Route::post('/crop-profile-picture', array
(
	'uses' => 'ImageController@crop_profile_picture'
));