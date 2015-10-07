<?php

namespace App\Services\Api\Http\Requests;

use PragmaRX\Sdk\Core\Validation\FormRequest;

class UploadFile extends FormRequest
{
	public function rules()
	{
		return [
			'file' => 'required|image',
		];
	}
}
