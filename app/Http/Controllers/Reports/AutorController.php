<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Services\Contracts\Reports\AutorReportServiceContract;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function __construct(
        private AutorReportServiceContract $autorReportService
    ) {
    }

    public function autores(Request $request)
    {
        $data = $this->autorReportService->getLivrosByAutores();

        return view('reports/autor',
            ['data' => $data]
        );
    }
}
