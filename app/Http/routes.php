<?php

use App\Services\Users\Data\Entities\User;

Route::get('/', ['as' => 'home', function ()
{
    return view('home.index');
}]);

Route::group(['middleware' => 'auth'], function()
{
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
