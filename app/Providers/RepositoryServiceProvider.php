<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Product\ProductInterface',
            'App\Repositories\Product\ProductRepository'
        );

        $this->app->bind(
            'App\Repositories\Slider\SliderInterface',
            'App\Repositories\Slider\SliderRepository'
        );

        $this->app->bind(
            'App\Repositories\Ads\AdsInterface',
            'App\Repositories\Ads\AdsRepository'
        );
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