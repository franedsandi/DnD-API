<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Braintree\Gateway;

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
        Paginator::useBootstrapFive();
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    "environment" => 'sandbox',
                    "merchantId" => '4wkxtkpsm9t72g5r',
                    "publicKey" => 'thmgxn9xrg46fwxc',
                    "privateKey" => '7c267b695aab6cfe9561051234613017',
                ]
            );
        });
    }
}
