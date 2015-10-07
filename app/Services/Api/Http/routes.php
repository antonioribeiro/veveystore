<?php

Route::group(['middleware' => 'auth'], function()
{
	Route::group(['namespace' => 'App\Services\Api\Http\Controllers', 'prefix' => 'api/v1'], function()
	{
		Route::group(['prefix' => 'upload'], function()
		{
			Route::post('file', ['as' => 'api.upload.file', 'uses' => 'Upload@file']);
		});
	});
});
