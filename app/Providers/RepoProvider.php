<?php

namespace App\Providers;

use App\Interface\UserInterface;
use App\Repo\UserRepo;
use Illuminate\Support\ServiceProvider;

class RepoProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserInterface::class, UserRepo::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
