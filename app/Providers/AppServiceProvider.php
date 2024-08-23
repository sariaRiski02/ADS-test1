<?php

namespace App\Providers;

use App\Models\Employee;
use Illuminate\Support\Facades\Route;
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
        Route::model('Employee', Employee::class, function ($value) {
            return Employee::where('nomor_induk', $value)->firstOrFail();
        });
    }
}
