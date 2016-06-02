<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('login', function()
{
	if ( !Auth::check() )
	{
		return View::make('login');
	}
	else
	{
		return Redirect::to('/dashboard');
	}
});

Route::post('login', [ 'as' => 'admin.do.login', 'uses' => 'HomeController@doLogin' ]);
Route::get('logout', [ 'as' => 'admin.do.logout', 'uses' => 'HomeController@doLogout' ]);

Route::group([ 'before' => 'auth' ], function()
{
	Route::get('/', function()
	{
		return View::make('layout');
	});

});

/*Route::group([ 'prefix' => 'kadomerdeka' ], function(){
		Route::get('/', [ 'as' => 'index.kado', 'uses' => 'kadomerdekaController@index' ]);
		Route::get('/create', [ 'as' => 'create_kado', 'uses' => 'kadomerdekaController@create' ]);
		Route::get('/store', [ 'as' => 'store_kado', 'uses' => 'kadomerdekaController@store' ]);
		Route::get('/edit/{id}', [ 'as' => 'edit_kado', 'uses' => 'kadomerdekaController@edit' ]);
		Route::get('/destroy/{id}', [ 'as' => 'destroy_kado', 'uses' => 'kadomerdekaController@destroy' ]);
});*/

// user
Route::group([ 'prefix'=> 'user' ], function()
{	
	Route::get('/', [ 'as' => 'index_user', 'uses' => 'UserController@index' ]);
	Route::get('/create', [ 'as' => 'create_user', 'uses' => 'UserController@create' ]);
	Route::post('/store', [ 'as' => 'store_user', 'uses' => 'UserController@store' ]);
	Route::get('/edit/{id}', [ 'as' => 'edit_user', 'uses' => 'UserController@edit' ]);
	Route::get('/destroy/{id}', [ 'as' => 'destroy_user', 'uses' => 'UserController@destroy' ]);
});

// community
Route::group([ 'prefix' => 'community' ], function(){
	Route::get('/', [ 'as' => 'index_community', 'uses' => 'CommunityController@index' ]);
	Route::get('/create', [ 'as' => 'create_community', 'uses' => 'CommunityController@create' ]);
	Route::post('/store', [ 'as' => 'store_community', 'uses' => 'CommunityController@store' ]);
	Route::get('/edit/{id}', [ 'as' => 'edit_community', 'uses' => 'CommunityController@edit' ]);
	Route::get('/destroy/{id}', [ 'as' => 'delete_community', 'uses' => 'CommunityController@destroy' ]);
	 Route::post('/set-inactive/{id}', [ 'as' => 'community.set.inactive', 'uses' => 'CommunityController@setInactive' ]);
	 Route::post('/set-Activate/{id}', [ 'as' => 'community.set.active', 'uses' => 'CommunityController@setActivate' ]);
	Route::get('/detail/{id}', [ 'as' => 'detail_community','uses' => 'CommunityController@detail' ]);
	Route::get('/member/{id}', [ 'as' => 'member_community', 'uses' => 'CommunityController@Member' ]);
	Route::post('/approve_member', [ 'as' => 'admin.community.approveMember', 'uses' => 'CommunityController@approveMember' ]);
	Route::post('/remove_member', [ 'as' => 'admin.community.removeMember', 'uses' => 'CommunityController@removeMember' ]);
	Route::post('/setOrganizer', [ 'as' => 'admin.set.organizer', 'uses' => 'CommunityController@setOrganizer' ]);
	Route::post('/removeOrganizer', [ 'as' => 'admin.remove.organizer', 'uses' => 'CommunityController@removeOrganizer' ]);
	Route::post('/transfer_creator', [ 'as' => 'admin.transfer.creator', 'uses' => 'CommunityController@transferCreator' ]);
});

// event
Route::group([ 'prefix' => 'event' ], function(){
	Route::get('/', [ 'as' => 'index_event', 'uses' => 'EventController@index' ]);
	Route::get('/create', [ 'as' => 'create_event', 'uses' => 'EventController@create' ]);
	Route::post('/store', [ 'as' => 'store_event', 'uses' => 'EventController@store' ]);
	Route::get('/edit/{id}', [ 'as' => 'edit_event', 'uses' => 'EventController@edit' ]);
	Route::get('/destroy/{id}', [ 'as' => 'destroy_event', 'uses' => 'EventController@destroy' ]);
	Route::get('/detail/{id}', [ 'as' => 'detail_event', 'uses' => 'EventController@detail' ]);
});

// dashboard
Route::group([ 'prefix' => 'dashboard' ], function(){
	Route::get('/', [ 'as' => 'index_dashboard', 'uses' => 'DashboardController@index' ]);
});

// meetup
Route::group([ 'prefix' => 'meetup' ], function() {
	Route::get('/', [ 'as' => 'index_meetup', 'uses' => 'MeetupController@index' ]);
	Route::get('/detail/{id}', [ 'as' => 'detial_meetup', 'uses' => 'MeetupController@detail' ]);
});

// Channel
Route::group([ 'prefix' => 'channel' ], function() {
	Route::get('/', [ 'as' => 'index_channel', 'uses' => 'ChannelController@index' ]);
	Route::get('/detail/{id}', [ 'as' => 'detail_channel', 'uses' => 'ChannelController@detail' ]);
});