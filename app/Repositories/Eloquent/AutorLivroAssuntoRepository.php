<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\AutorLivroAssuntoRepositoryContract;
use App\Views\AutoresLivrosAssuntosView;

class AutorLivroAssuntoRepository implements AutorLivroAssuntoRepositoryContract
{
    public function __construct(
        private AutoresLivrosAssuntosView $view
    ) {
    }

    public function get(): ?array
    {
        return $this->view->select("*")
            ->get()
            ?->toArray();
    }
}
