<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;



class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
     
 ];

   
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() //DispatcherContract $events
    {
        
        
    }
}


   