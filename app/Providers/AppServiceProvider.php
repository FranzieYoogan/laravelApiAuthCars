<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route; // <- IMPORTANT!

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Load web routes
        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        // Load API routes with prefix and middleware
        Route::prefix('api')
            ->middleware('api')
            ->group(base_path('routes/api.php'));
    }
}
