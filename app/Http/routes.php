<?php

use PragmaRX\Sdk\Services\Categories\Data\Entities\Category;

Route::get('/', ['as' => 'home', function ()
{
    return view('home.index');
}]);

Route::get('category', ['as' => 'cate', function ()
{
	return Category::where('name', '=', 'vestimenta')
			->first()
			->getDescendantsAndSelf()
			->toHierarchy();
}]);
