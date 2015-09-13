<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Users\Data\Repositories\User as UserRepository;
use PragmaRX\Sdk\Services\Users\Data\Contracts\UserRepository as UserRepositoryContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
	    $this->app->bind(UserRepositoryContract::class, UserRepository::class);
    }
}
