<?php

namespace App\Providers;

use App\Services\Logger\LaraframeLogger;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Override\Api\CoinpaymentsApi;
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
        Schema::defaultStringLength(191);
        $this->app->singleton('logger', LaraframeLogger::class);

        $this->app->bind("CoinpaymentsApi", function ($app, $parameters) {
            return new CoinpaymentsApi($parameters[0]);
        });
    }
}
