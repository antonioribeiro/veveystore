<?php

namespace App\Services\Api\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use App\Services\Api\Http\Requests\UploadFile;
use PragmaRX\Sdk\Services\Files\Data\Repositories\File as FileRepository;

class Upload extends Controller
{
	public function file(UploadFile $request, FileRepository $fileRepository)
	{
		$fileRepository->upload($request['file'], Auth::user());

		return ['success' => true];
    }
}
