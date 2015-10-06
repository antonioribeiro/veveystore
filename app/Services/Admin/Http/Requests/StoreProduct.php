<?php

namespace App\Services\Admin\Http\Requests;

use PragmaRX\Sdk\Core\Validation\FormRequest;

class StoreProduct extends FormRequest
{
	public function rules()
	{
		return [
			'name' => 'required',
			'description' => 'required',
			'price' => 'required',
			'cost' => 'required',
			'price' => 'required',
			'stock' => 'required',
			'brand_id' => 'required',
			'category_id' => 'required',
			'unit_id' => 'required',
		];
	}
}
