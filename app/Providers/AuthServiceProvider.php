<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use PragmaRX\Sdk\Services\Permissions\Data\Entities\Permission;

class AuthServiceProvider extends ServiceProvider
{
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		'App\Services\Admin\Policies\Admin' => 'App\Services\Admin\Policies\Admin',
	];

	/**
	 * Register any application authentication / authorization services.
	 *
	 * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
	 * @return void
	 */
	public function boot(GateContract $gate)
	{
		parent::registerPolicies($gate);

		foreach ($this->getPermissions() as $permission)
		{
			$gate->define($permission->name, function($user) use ($permission) {
				return $user->hasRole($permission->roles);
			});
		}
	}

	private function getPermissions()
	{
		return Permission::with('roles')->get();
	}
}
