<?php

namespace App\Providers;

use App\Observers\PortfolioImageObserver;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use App\Observers\ContactObserver;
use App\PortfolioImage;
use App\Contact;
use Illuminate\Support\Facades\Schema;
use App\Portfolio;
use App\Observers\PortfolioObserver;

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
        Portfolio::observe(PortfolioObserver::class);
        PortfolioImage::observe(PortfolioImageObserver::class);
        Contact::observe(ContactObserver::class);
        Schema::defaultStringLength(191);

        Validator::extend('recaptcha', 'App\\Validators\\ReCaptcha@validate');

    }
}
