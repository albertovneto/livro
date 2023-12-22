<?php

namespace App\Providers;

use App\Services\Contracts\{
    AssuntoServiceContract,
    AutorServiceContract,
    LivroServiceContract,
    Reports\AutorReportServiceContract,
    Reports\XlsxReportServiceContract
};
use App\Services\{
    AssuntoService,
    AutorService,
    LivroService,
    Reports\AutorReportService,
    Reports\XlsxReportService
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

        $this->app->bind(
            XlsxReportServiceContract::class,
            XlsxReportService::class
        );
    }

    public function boot(): void
    {
        //
    }
}
