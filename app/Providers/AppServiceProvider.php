<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
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
        // Schema::defaultStringLength(191);

        // Carbon Lokal Waktu
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        // Cegah Lazy Loading Developer Lain
        Model::preventLazyLoading();

        Gate::define('admin', function(User $user) {
            $user->role === 'admin';
        });

        // Ganti Style Pagination
        // Paginator::useBootstrapFive();
    }
}
