<?php

namespace App\Http\Controllers;

use App\Exceptions\NotFoundException;
use App\Services\Contracts\AssuntoServiceContract;
use App\Services\Contracts\AutorServiceContract;
use App\Services\Contracts\LivroServiceContract;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Throwable;

class LivroController extends Controller
{
    public function __construct(
        private LivroServiceContract $livroService,
        private AutorServiceContract $autorService,
        private AssuntoServiceContract $assuntoService
    ) {
    }

    public function list(Request $request)
    {
        $livros = $this->livroService->list();

        return view('livro/list',
            ['livros' => $livros]
        );
    }

    public function create(Request $request)
    {
        return view('livro/create',
            ['assuntos' => $this->assuntoService->list(), 'autores' => $this->autorService->list()]
        );
    }

    public function edit(Request $request)
    {
        return view('livro/update',
            [
                'livro' => $this->livroService->listById($request->id),
                'assuntos' => $this->assuntoService->list(),
                'autores' => $this->autorService->list()
            ]
        );
    }

    public function delete(Request $request)
    {

    }

    public function insert(Request $request)
    {
        try {
            $request->validate([
                'titulo' => 'required|max:40',
                'editora' => 'required|max:40',
                'edicao' => 'required',
                'ano_publicacao' => 'required|max:4',
                'preco' => 'required',
                'assunto' => 'required',
                'autor' => 'required'
            ]);

            $this->livroService->insert($request->toArray());

            $typeMessage = 'success';
            $message = 'Livro criado com sucesso';
        } catch (ValidationException $validationException) {
            $typeMessage = 'error';
            $message = $validationException->getMessage();
        } catch (Throwable $notFoundException) {
            $typeMessage = 'error';
            $message = $notFoundException->getMessage();
        }

        return redirect()->route('livro')
            ->with($typeMessage, $message);
    }

    public function update(Request $request)
    {
        return redirect()->route('livro')
            ->with('success', 'Livro editado com sucesso.');
    }
}
