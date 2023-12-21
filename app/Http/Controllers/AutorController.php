<?php

namespace App\Http\Controllers;

use App\Exceptions\NotFoundException;
use App\Services\Contracts\AutorServiceContract;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Throwable;

class AutorController extends Controller
{
    public function __construct(
        private AutorServiceContract $autorService
    ) {
    }

    public function list(Request $request)
    {
        return view('autor/list',
            ['autores' => $this->autorService->list()]
        );
    }

    public function create(Request $request)
    {
        return view('autor/create');
    }

    public function edit(Request $request)
    {
        return view('autor/update',
            ['autor' => $this->autorService->listById((int) $request->id)]
        );
    }

    public function delete(Request $request)
    {
        try {
            $this->autorService->delete((int) $request->id);

            $message = 'Autor deletado com sucesso';
            $typeMessage = 'success';
        } catch (NotFoundException $notFoundException) {
            $message = $notFoundException->getMessage();
            $typeMessage = 'error';
        } catch (QueryException $queryException) {
            $message = $queryException->getMessage();
            if ($queryException->getCode() === '23000') {
                $message = 'Existem livros atrelados a esse autor';
            }
            $typeMessage = 'error';
        } catch (Throwable $throwable) {
            $message = $throwable->getMessage();
            $typeMessage = 'error';
        }

        return redirect('autor')
            ->with($typeMessage, $message);
    }

    public function insert(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'nome' => 'required|max:40',
            ]);

            $this->autorService->insert($request->toArray());

            return redirect('autor')
                ->with('success', 'Autor criado com sucesso');
        } catch (ValidationException $validationException) {
            return redirect('autor/criar')
                ->with('error', $validationException->getMessage());
        } catch (Throwable $throwable) {
            return redirect('autor/criar')
                ->with('error', $throwable->getMessage());
        }
    }

    public function update(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'nome' => 'required|max:40',
            ]);

            $this->autorService->update((int) $request->id, $request->toArray());

            return redirect('autor')
                ->with('success', 'Autor alterado com sucesso');

        } catch (ValidationException $validationException) {
            $errorMessage = $validationException->getMessage();
        } catch (NotFoundException $notFoundException) {
            $errorMessage = $notFoundException->getMessage();
        } catch (Throwable $throwable) {
            $errorMessage = $throwable->getMessage();
        }

        return redirect("autor/{$request->id}/editar")
            ->with('error', $errorMessage);
    }
}
