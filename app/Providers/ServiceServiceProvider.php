<?php

namespace App\Providers;

use App\Services\Contracts\{
    AssuntoServiceContract,
    AutorServiceContract,
    LivroServiceContract,
    Reports\AutorReportServiceContract
};
use App\Services\{
    AssuntoService,
    AutorService,
    LivroService,
    Reports\AutorReportService
};
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            LivroServiceContract::class,
            LivroService::class
        );

        $this->app->bind(
            AssuntoServiceContract::class,
            AssuntoService::class
        );

        $this->app->bind(
            AutorServiceContract::class,
            AutorService::class
        );

        $this->app->bind(
            AutorReportServiceContract::class,
            AutorReportService::class
        );
    }

    public function boot(): void
    {
        //
    }
}
