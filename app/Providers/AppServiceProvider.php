<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\RifaRepositoryInterface',
            'App\Repositories\Eloquent\RifaRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\ParticipanteRepositoryInterface',
            'App\Repositories\Eloquent\ParticipanteRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
