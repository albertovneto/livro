<?php

namespace App\Services\Contracts\Reports;

interface XlsxReportServiceContract
{
    public function generate(array $data): string;
}
