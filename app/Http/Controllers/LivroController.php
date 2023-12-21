<?php

namespace App\Http\Controllers;

use App\Exceptions\NotFoundException;
use App\Services\Contracts\AssuntoServiceContract;
use App\Services\Contracts\AutorServiceContract;
use App\Services\Contracts\LivroServiceContract;
use Illuminate\Http\RedirectResponse;
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
        return view('livro/list',
            ['livros' => $this->livroService->list()]
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
        try {
            $this->livroService->delete($request->id);

            $message = 'Livro deletado com sucesso';
            $typeMessage = 'success';
        } catch (NotFoundException $notFoundException) {
            $message = $notFoundException->getMessage();
            $typeMessage = 'error';
        }  catch (Throwable $throwable) {
            $message = $throwable->getMessage();
            $typeMessage = 'error';
        }

        return redirect('livro')
            ->with($typeMessage, $message);
    }

    public function insert(Request $request): RedirectResponse
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

            return redirect('livro')
                ->with('success', 'Livro criado com sucesso');
        } catch (ValidationException $validationException) {
            return redirect('livro/criar')
                ->with('error', $validationException->getMessage());
        } catch (Throwable $throwable) {
            return redirect('livro/criar')
                ->with('error', $throwable->getMessage());
        }
    }

    public function update(Request $request): RedirectResponse
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

            $this->livroService->update($request->id, $request->toArray());

            return redirect('livro')
                ->with('success', 'Livro alterado com sucesso');

        } catch (ValidationException $validationException) {
            $errorMessage = $validationException->getMessage();
        } catch (NotFoundException $notFoundException) {
            $errorMessage = $notFoundException->getMessage();
        } catch (Throwable $throwable) {
            $errorMessage = $throwable->getMessage();
        }

        return redirect("livro/{$request->id}/editar")
            ->with('error', $errorMessage);
    }
}
