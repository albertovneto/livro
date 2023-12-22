<?php

namespace App\Services\Reports;

use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Services\Contracts\Reports\XlsxReportServiceContract;

class XlsxReportService implements XlsxReportServiceContract
{
    public function __construct(
        private Spreadsheet $spreadsheet
    ) {}

    public function generate(array $data): string
    {
        $sheet = $this->spreadsheet->getActiveSheet();

        $sheet->fromArray($data, null, 'A2');

        $writer = new Xlsx($this->spreadsheet);
        $fileName = md5(now()).'.xlsx';

        $writer->save($fileName);

        return $fileName;
    }
}
