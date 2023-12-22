<?php

namespace App\Services\Contracts\Reports;

interface AutorReportServiceContract
{
    public function getLivrosByAutores(): ?array;

    public function generateXlsx(): string;
}
