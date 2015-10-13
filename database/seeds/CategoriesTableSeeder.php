<?php

use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use PragmaRX\Sdk\Services\Categories\Data\Entities\Category;

class CategoriesTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('categories')->delete();

		$root = Category::create([
            'name' => 'vestimenta',
		]);

		$masculine = $root->children()->create(['name' => 'Homens']);
		$masculine->children()->create(['name' => 'Blusas']);
		$masculine->children()->create(['name' => 'Bermudas']);
		$masculine->children()->create(['name' => 'Calças']);
		$masculine->children()->create(['name' => 'Camisas']);
		$masculine->children()->create(['name' => 'Camisetas']);
		$masculine->children()->create(['name' => 'Cuecas']);
		$masculine->children()->create(['name' => 'Jaquetas']);
		$masculine->children()->create(['name' => 'Moletons']);
		$masculine->children()->create(['name' => 'Polos']);

		$feminine = $root->children()->create(['name' => 'Mulheres']);
		$feminine->children()->create(['name' => 'Blusas']);
		$feminine->children()->create(['name' => 'Calças']);
		$feminine->children()->create(['name' => 'Camisas']);
		$feminine->children()->create(['name' => 'Camisetas']);
		$feminine->children()->create(['name' => 'Moletons']);
		$feminine->children()->create(['name' => 'Saias']);
		$feminine->children()->create(['name' => 'Shorts']);
		$feminine->children()->create(['name' => 'Tops']);
		$feminine->children()->create(['name' => 'Vestidos']);
	}
}
