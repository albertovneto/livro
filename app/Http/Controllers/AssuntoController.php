<?php

namespace App\Http\Controllers;

use App\Exceptions\NotFoundException;
use App\Services\Contracts\AssuntoServiceContract;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Throwable;

class AssuntoController extends Controller
{
    public function __construct(
        private AssuntoServiceContract $assuntoService
    ) {
    }

    public function list(Request $request)
    {
        return view('assunto/list',
            ['assuntos' => $this->assuntoService->list()]
        );
    }

    public function create(Request $request)
    {
        return view('assunto/create');
    }

    public function edit(Request $request)
    {
        return view('assunto/update',
            ['assunto' => $this->assuntoService->listById((int) $request->id)]
        );
    }

    public function delete(Request $request)
    {
        try {
            $this->assuntoService->delete((int) $request->id);

            $message = 'Assunto deletado com sucesso';
            $typeMessage = 'success';
        } catch (NotFoundException $notFoundException) {
            $message = $notFoundException->getMessage();
            $typeMessage = 'error';
        } catch (QueryException $queryException) {
            $message = $queryException->getMessage();
            if ($queryException->getCode() === '23000') {
                $message = 'Existem livros atrelados a essa assunto';
            }
            $typeMessage = 'error';
        } catch (Throwable $throwable) {
            $message = $throwable->getMessage();
            $typeMessage = 'error';
        }

        return redirect('assunto')
            ->with($typeMessage, $message);
    }

    public function insert(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'descricao' => 'required|max:20',
            ]);

            $this->assuntoService->insert($request->toArray());

            return redirect('assunto')
                ->with('success', 'Assunto criado com sucesso');
        } catch (ValidationException $validationException) {
            return redirect('assunto/criar')
                ->with('error', $validationException->getMessage());
        } catch (Throwable $throwable) {
            return redirect('assunto/criar')
                ->with('error', $throwable->getMessage());
        }
    }

    public function update(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'descricao' => 'required|max:20',
            ]);

            $this->assuntoService->update((int) $request->id, $request->toArray());

            return redirect('assunto')
                ->with('success', 'Assunto alterado com sucesso');

        } catch (ValidationException $validationException) {
            $errorMessage = $validationException->getMessage();
        } catch (NotFoundException $notFoundException) {
            $errorMessage = $notFoundException->getMessage();
        } catch (Throwable $throwable) {
            $errorMessage = $throwable->getMessage();
        }

        return redirect("assunto/{$request->id}/editar")
            ->with('error', $errorMessage);
    }
}
