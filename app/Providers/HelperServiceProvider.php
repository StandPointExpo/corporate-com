<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        foreach (glob(app_path() . '/Helpers/*.php') as $filename){
//            require_once($filename);
//        }
        $ImageHelper = app_path('Helpers/ImageHelper.php');
        if (file_exists($ImageHelper)) {
            require_once($ImageHelper);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
