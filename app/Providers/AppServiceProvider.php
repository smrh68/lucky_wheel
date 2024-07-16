<?php

namespace App\Providers;

use App\Events\AwardSelected;
use App\Listeners\FaxToWarehouseKeeper;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(10)->perSecond(1)->by($request->user()?->id ?: $request->ip());
        });

        Event::listen(
            AwardSelected::class,
            FaxToWarehouseKeeper::class,
        );
    }
}
