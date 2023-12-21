<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    AssuntoRepositoryContract,
    AutorRepositoryContract,
    LivroRepositoryContract
};
use App\Repositories\Eloquent\{
    AssuntoRepository,
    AutorRepository,
    LivroRepository
};
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            LivroRepositoryContract::class,
            LivroRepository::class
        );

        $this->app->bind(
            AssuntoRepositoryContract::class,
            AssuntoRepository::class
        );

        $this->app->bind(
            AutorRepositoryContract::class,
            AutorRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}
