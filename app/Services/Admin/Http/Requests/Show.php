<?php

namespace App\Services\Admin\Http\Requests;

use Gate;
use App\Services\Admin\Policies\Admin;
use PragmaRX\Sdk\Core\Validation\FormRequest;

class Show extends FormRequest
{
	public $ability = Admin::class;
}
