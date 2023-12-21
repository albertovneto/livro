<?php

namespace App\Repositories\Eloquent;

use App\Exceptions\NotFoundException;
use App\Models\Livro;
use App\Repositories\Contracts\LivroRepositoryContract;

class LivroRepository implements LivroRepositoryContract
{
    public function __construct(
        private Livro $model
    ) {
    }

    public function get(): ?array
    {
        return $this->model->with(['livroAutor', 'livroAssunto'])->get()?->toArray();
    }

    public function getById(int $id): ?array
    {
        return $this->model->with(['livroAutor', 'livroAssunto'])->where(['id' => $id])->first()?->toArray();
    }

    public function update(int $id, array $data): bool
    {
        $livro = $this->model->find($id);

        if ($livro === false) {
            $this->throwNotFoundException($id);
        }

        $livro->update([
            'titulo' => $data['titulo'],
            'editora' => $data['editora'],
            'edicao' => $data['edicao'],
            'ano_publicacao' => $data['ano_publicacao'],
            'preco' => $data['preco']
        ]);

        $livro = $this->syncAutorAndAssunto($data, $livro);

        $livro->refresh();

        return true;
    }

    public function delete(int $id): bool
    {
        $livro = $this->model->find($id);

        if ($livro === false) {
            $this->throwNotFoundException($id);
        }

        return $livro->delete();
    }

    public function insert($data): bool
    {
        $livro = $this->model->create([
            'titulo' => $data['titulo'],
            'editora' => $data['editora'],
            'edicao' => $data['edicao'],
            'ano_publicacao' => $data['ano_publicacao'],
            'preco' => $data['preco']
        ]);

        $this->syncAutorAndAssunto($data, $livro);

        return true;
    }

    protected function throwNotFoundException(int $id)
    {
        throw new NotFoundException("Livro $id não encontrado");
    }

    protected function syncAutorAndAssunto(array $data, Livro $livro): Livro
    {
        if (count($data['autor']) > 0) {
            $livro->livroAutor()->sync($data['autor']);
        }

        if (count($data['assunto']) > 0) {
            $livro->livroAssunto()->sync($data['assunto']);
        }

        return $livro;
    }
}
