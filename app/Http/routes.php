<?php

Route::get('/', ['as' => 'home', function ()
{
    return view('home.index');
}]);

Route::group(['middleware' => 'auth'], function()
{
	Route::group(['namespace' => 'App\Services\Admin\Http\Controllers', 'prefix' => 'admin'], function()
	{
		Route::get('/', ['as' => 'admin.home', 'uses' => 'Admin@index']);

		Route::group(['prefix' => 'products'], function()
		{
			Route::get('edit', ['as' => 'admin.products', 'uses' => 'Product@index']);
		});
	});
});
