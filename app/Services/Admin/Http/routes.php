<?php

Route::group(['middleware' => 'auth'], function()
{
	Route::group(['namespace' => 'App\Services\Admin\Http\Controllers', 'prefix' => 'admin'], function()
	{
		Route::get('/', ['as' => 'admin.home', 'uses' => 'Admin@index']);

		Route::group(['prefix' => 'products'], function()
		{
			Route::get('/', ['as' => 'admin.products', 'uses' => 'Products@index']);
			Route::get('create', ['as' => 'admin.products.create', 'uses' => 'Products@create']);
		});
	});
});
