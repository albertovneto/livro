<?php

namespace App\Services\Reports;


use App\Repositories\Contracts\AutorLivroAssuntoRepositoryContract;
use App\Services\Contracts\Reports\AutorReportServiceContract;
use App\Services\Contracts\Reports\XlsxReportServiceContract;

class AutorReportService implements AutorReportServiceContract
{
    public function __construct(
        private AutorLivroAssuntoRepositoryContract $autoresLivrosAssuntosRepository,
        private XlsxReportServiceContract $xlsxReportServiceContract
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

    public function generateXlsx(): string
    {
        $data = [ 0 => ['autor_id', 'autor_name', 'livros_id', 'total_livros', 'titulos_livros', 'assuntos_ids', 'descricoes_assuntos']];
        $data = array_merge_recursive($data, $this->autoresLivrosAssuntosRepository->get());

        return $this->xlsxReportServiceContract->generate($data);
    }
}
