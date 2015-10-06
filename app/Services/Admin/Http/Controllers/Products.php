<?php

namespace App\Services\Admin\Http\Controllers;

use Auth;
use Flash;
use App\Http\Controllers\Controller;
use App\Services\Admin\Http\Requests\Show;
use PragmaRX\Sdk\Services\Products\Commands\AddProduct;
use App\Services\Admin\Http\Requests\StoreProduct as StoreProductRequest;
use PragmaRX\Sdk\Services\Products\Data\Entities\Brand;
use PragmaRX\Sdk\Services\Products\Data\Entities\Category;
use PragmaRX\Sdk\Services\Products\Data\Entities\Unit;

class Products extends Controller
{
	public function index(Show $request)
	{
		return view('admin.products.index');
    }

	public function create()
	{
		$brands = Brand::get()->lists('name', 'id');
		$categories = Category::get()->lists('name', 'id');
		$units = Unit::get()->lists('name', 'id');

		return view('admin.products.create')
				->with('brands', $brands)
				->with('categories', $categories)
				->with('units', $units);
	}

	public function store(StoreProductRequest $request)
	{
		$input = ['user' => Auth::user()] + $request->all();

		$this->execute(AddProduct::class, $input);

		Flash::message(t('paragraphs.group-added'));

		return redirect()->back();
	}
}
