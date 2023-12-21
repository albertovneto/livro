@extends('layouts.default')

@section('title', 'Relatório - Autor')

@section('content')
    <div class="title-crud row">
        <div class="col-9">
            <h2>Relatório</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <canvas id="chart-1"></canvas>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/chart.js@^3"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@^2"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment@^1"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('chart-1');

        new Chart(ctx, {
            type: 'bar',
            data: {
                datasets: [{
                    data: {{ \Illuminate\Support\Js::from($data) }},
                    label: 'Quantidade de livros por autores',
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.2)',
                    ],
                }]
            },
        });
    });
</script>
