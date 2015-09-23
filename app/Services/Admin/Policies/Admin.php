<?php

namespace App\Services\Admin\Policies;

use App\Services\Users\Data\Entities\User;

class Admin
{
	public function show(User $user, Admin $admin)
	{
		return $user->is_admin;
    }
}
