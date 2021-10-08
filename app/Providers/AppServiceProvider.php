<?php

namespace App\Providers;

use App\Observers\PortfolioImageObserver;
use App\Tasks\Task;
use App\Tasks\TaskAreaParameter;
use App\Tasks\TaskConstructionParameter;
use App\Tasks\TaskDesignWish;
use App\Tasks\TaskTechnicalParameter;
use Illuminate\Database\Eloquent\Relations\Relation;
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
        Relation::morphMap([
            'task_construction_parameters'  => TaskConstructionParameter::class,
            'task_technical_parameters'     => TaskTechnicalParameter::class,
            'task_area_parameters'          => TaskAreaParameter::class,
            'task_design_wishes'            => TaskDesignWish::class,
            'tasks'                         => Task::class,
        ]);
        Portfolio::observe(PortfolioObserver::class);
        PortfolioImage::observe(PortfolioImageObserver::class);
        Contact::observe(ContactObserver::class);
        Schema::defaultStringLength(191);

        Validator::extend('recaptcha', 'App\\Validators\\ReCaptcha@validate');

    }
}
