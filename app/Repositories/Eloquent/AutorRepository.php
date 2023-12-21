<?php

namespace App\Repositories\Eloquent;

use App\Exceptions\NotFoundException;
use App\Models\Autor;
use App\Repositories\Contracts\AutorRepositoryContract;

class AutorRepository implements AutorRepositoryContract
{
    public function __construct(
        private Autor $model
    ) {
    }

    public function get(): ?array
    {
        return $this->model->get()?->toArray();
    }

    public function getById(int $id): ?array
    {
        return $this->model->where(['id' => $id])->first()?->toArray();
    }

    public function update(int $id, array $data): bool
    {
        $autor = $this->model->find($id);

        if (empty($autor)) {
            $this->throwNotFoundException($id);
        }

        $autor->update([
            'nome' => $data['nome'],
        ]);

        $autor->refresh();

        return true;
    }

    public function delete(int $id): bool
    {
        $autor = $this->model->find($id);

        if (empty($autor)) {
            $this->throwNotFoundException($id);
        }

        return $autor->delete();
    }

    public function insert(array $data): bool
    {
        $this->model->create([
            'nome' => $data['nome'],
        ]);

        return true;
    }

    protected function throwNotFoundException(int $id)
    {
        throw new NotFoundException("Autor $id não encontrado");
    }
}
