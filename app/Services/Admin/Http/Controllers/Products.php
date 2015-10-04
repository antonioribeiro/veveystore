<?php

namespace App\Services\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Admin\Http\Requests\Show;

class Products extends Controller
{
	public function index(Show $request)
	{
		return view('admin.products.index');
    }

	public function create()
	{
		return view('admin.products.create');
	}
}
