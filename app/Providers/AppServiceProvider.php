<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//AGREGUE
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

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
        //AGREGUE
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
    }
}
