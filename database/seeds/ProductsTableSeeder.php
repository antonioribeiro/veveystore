<?php

use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use PragmaRX\Sdk\Services\Products\Data\Entities\Brand;
use PragmaRX\Sdk\Services\Products\Data\Entities\Category;
use PragmaRX\Sdk\Services\Products\Data\Entities\Unit;

class ProductsTableSeeder extends Seeder
{
	private $names = [];

	public function run()
	{
		DB::table('products')->delete();
		DB::table('products_brands')->delete();
		DB::table('products_categories')->delete();
		DB::table('products_units')->delete();

		Brand::create([
			'name' => 'Vevey',
		]);

		Unit::create([
			'code' => 'PC',
		    'name' => 'Peça',
		]);

		Category::create([
			'name' => 'Feminino',
		]);

		Category::create([
			'name' => 'Masculino',
		]);
	}
}
