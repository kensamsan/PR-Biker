<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product;
use View;
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
        View::composer('*', function($view)
        {
            $view->with('featured_product',  Product::inRandomOrder()->limit(5)->get());

            


        });
        
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
