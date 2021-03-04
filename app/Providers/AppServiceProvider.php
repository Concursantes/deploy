<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use Illuminate\Pagination\Paginator;

use App\Models\Estructura;
use App\Observers\EstructuraObserver;

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
        //Estructura::observe(EstructuraObserver::class);
    }
}
