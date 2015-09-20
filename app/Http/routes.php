<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Services\Users\Data\Entities\User;

Route::get('/', ['as' => 'home', function ()
{
    return view('home.index');
}]);

Route::get('email', function()
{
	$user = User::first();

	$repo = app()->make(\App\Services\Users\Data\Repositories\User::class);

	$repo->sendEmail(
		$user,
		'emails.register.user-registered',
		t('captions.activate-your-account')
	);
});

Route::group(['middleware' => 'auth', 'prefix' => 'beta'], function()
{
	Route::group(['namespace' => 'App\Services\Home\Http\Controllers'], function()
	{
		Route::get('/', ['as' => 'home', 'uses' => 'Home@index']);
	});

	Route::group(['namespace' => 'App\Services\Admin\Http\Controllers', 'prefix' => 'admin'], function()
	{
		Route::get('/', ['as' => 'admin.home', 'uses' => 'Admin@index']);

		Route::group(['prefix' => 'clipping'], function()
		{
			Route::get('create', ['as' => 'admin.clipping.create', 'uses' => 'Clipping@create']);

			Route::post('store', ['as' => 'admin.clipping.store', 'uses' => 'Clipping@store']);
			Route::post('store/validate', ['as' => 'admin.clipping.store.validate', 'uses' => 'Clipping@storeValidate']);

			Route::get('edit', ['as' => 'admin.clipping.edit', 'uses' => 'Clipping@edit']);
			Route::get('delete', ['as' => 'admin.clipping.delete', 'uses' => 'Clipping@delete']);
		});
	});
});
