<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //




//        DB::listen(function ($query) {
//            echo '<h3>'.$query->sql.'</h3>';
//        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
