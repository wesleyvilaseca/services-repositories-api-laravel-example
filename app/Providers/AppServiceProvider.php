<?php

namespace App\Providers;

use App\Repositories\BrandRepository;
use App\Repositories\Contracts\BrandRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->bind(BrandRepositoryInterface::class, BrandRepository::class);
    }
}
