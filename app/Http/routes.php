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
