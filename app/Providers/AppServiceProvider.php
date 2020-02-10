<?php

namespace App\Providers;

use App\Observers\PortfolioImageObserver;
use Illuminate\Support\ServiceProvider;
use App\Observers\ContactObserver;
use App\PortfolioImage;
use App\Contact;

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
        Contact::observe(ContactObserver::class);
    }
}
