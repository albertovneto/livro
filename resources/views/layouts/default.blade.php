<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}" />
    <script type="text/javascript" src="{{ asset('js/helpers.js') }}"></script>
    <script src="https://unpkg.com/imask"></script>
</head>
<body class="main-body">
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-left">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('livro') }}">Livros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('assunto') }}">Assuntos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('autor') }}">Autores</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

<main class="container">
    @yield('content')
</main>

<footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let element = document.getElementById('form-preco');
            let maskOptions = {
                mask: 'R$ num',
                blocks: {
                    num: {
                        mask: Number,
                        scale: 2,
                        thousandsSeparator: '.',
                        radix: ',',
                        mapToRadix: ['.']
                    }
                }
            }

            IMask(element, maskOptions);
        });
    </script>
</footer>
</body>
</html>
