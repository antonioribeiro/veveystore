<?php

Route::get('/', ['as' => 'home', function ()
{
    return view('home.index');
}]);
