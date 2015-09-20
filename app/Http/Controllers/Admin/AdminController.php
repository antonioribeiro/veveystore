<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	public function __construct(Gate $gate)
	{
	    $this->gate = $gate;
	}
	
	public function index()
	{
		if ($this->authorize('admin'))
		{
			abort(403, "You are not allowed to view this page.");
		}
    }
}
