<?php

namespace App\Providers;

use App\Models\Tanaman;
use Illuminate\Support\Facades\Gate;
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
        view()->composer('*',function($view) {
            $view->with('role', auth()->user()?->role);
        });

        Gate::define('akses-perhitungan', function ($user, Tanaman $tanaman) {
            return !$tanaman->status_perhitungan;
        });

        Gate::define('data-karakteristik-terisi', function ($user, Tanaman $tanaman) {
            $jumlahKriteria = \App\Models\Kriteria::count();

            return $jumlahKriteria == $tanaman->karakteristik()->count();
        });
    }
}
