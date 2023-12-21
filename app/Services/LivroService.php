<?php

namespace App\Services;

use App\Repositories\Contracts\LivroRepositoryContract;
use App\Services\Contracts\LivroServiceContract;

class LivroService implements LivroServiceContract
{
    public function __construct(
        private LivroRepositoryContract $livroRepository
    ) {
    }

    public function list(): ?array
    {
        return $this->livroRepository->get();
    }

    public function listById(int $id): ?array
    {
        return $this->livroRepository->getById($id);
    }

    public function insert(array $data): bool
    {
        return $this->livroRepository->insert($data);
    }

    public function update(int $id, array $data): bool
    {
        return true;
    }

    public function delete(int $id): bool
    {
        return true;
    }
}
