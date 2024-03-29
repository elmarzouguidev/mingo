<?php

namespace App\Providers;

use App\Http\Middleware\CacheResponseMiddleware;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Spatie\Menu\Laravel\Facades\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        Menu::macro('main', function () {
            return Menu::new()
                ->route('home', 'Home')
                ->route('about', 'Home')
                ->route('contact', 'Home');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);
        //
        // using the laravel voyager dashborad->add team (facebook, linked,....)
        Validator::extend('validateDomain', function ($attribute, $value, $parameters, $validator) {

            return preg_match('/^(?!:\/\/)(?=.{1,255}$)((.{1,63}\.){1,127}(?![0-9]*$)[a-z0-9-]+\.?)$/i', $value);
        });

        Schema::disableForeignKeyConstraints();

        $this->app->singleton(CacheResponseMiddleware::class);

    }
}
