<?php

namespace App\Services\Reports;


use App\Repositories\Contracts\AutorLivroAssuntoRepositoryContract;
use App\Services\Contracts\Reports\AutorReportServiceContract;

class AutorReportService implements AutorReportServiceContract
{
    public function __construct(
        private AutorLivroAssuntoRepositoryContract $autoresLivrosAssuntosRepository
    ) {
    }

    public function getLivrosByAutores(): ?array
    {
        $data = $this->autoresLivrosAssuntosRepository->get();

        if (empty($data)) {
            return null;
        }

        return array_map(function($item){
            return [
                'y' => $item['total_livros'],
                'x' => $item['autor_nome']
            ];
        }, $data);
    }
}
