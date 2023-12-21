<?php

namespace App\Repositories\Eloquent;

use App\Exceptions\NotFoundException;
use App\Models\Assunto;
use App\Repositories\Contracts\AssuntoRepositoryContract;

class AssuntoRepository implements AssuntoRepositoryContract
{
    public function __construct(
        private Assunto $model
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
        $assunto = $this->model->find($id);

        if (empty($assunto)) {
            $this->throwNotFoundException($id);
        }

        $assunto->update([
            'descricao' => $data['descricao'],
        ]);

        $assunto->refresh();

        return true;
    }

    public function delete(int $id): bool
    {
        $assunto = $this->model->find($id);

        if (empty($assunto)) {
            $this->throwNotFoundException($id);
        }

        return $assunto->delete();
    }

    public function insert(array $data): bool
    {
        $this->model->create([
            'descricao' => $data['descricao'],
        ]);

        return true;
    }

    protected function throwNotFoundException(int $id)
    {
        throw new NotFoundException("Assunto $id não encontrado");
    }
}
