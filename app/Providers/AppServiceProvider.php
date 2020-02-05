<?php

namespace App\Providers;

use App\Observers\PortfolioImageObserver;
use Illuminate\Support\ServiceProvider;
use App\PortfolioImage;

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
        PortfolioImage::observe(PortfolioImageObserver::class);
    }
}
