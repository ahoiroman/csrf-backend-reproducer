<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {

            Route::prefix('api/v1')
                 ->middleware('api')
                 ->group(base_path('routes/api.php'));

            Route::middleware('web')
                 ->group(base_path('routes/web.php'));

            Route::group([
                             'namespace' => 'Laravel\Fortify\Http\Controllers',
                             'domain' => config('fortify.domain', null),
                             'prefix' => config('fortify.prefix'),
                         ], function () {
                $this->loadRoutesFrom(base_path('routes/auth.php'));
            });
        });
    }
}
