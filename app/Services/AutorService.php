<?php

namespace App\Services;

use App\Repositories\Contracts\AutorRepositoryContract;
use App\Services\Contracts\AutorServiceContract;

class AutorService implements AutorServiceContract
{
    public function __construct(
        private AutorRepositoryContract $autorRepository
    ) {
    }

    public function list(): ?array
    {
        return $this->autorRepository->get();
    }

    public function listById(int $id): ?array
    {
        return $this->autorRepository->getById($id);
    }

    public function insert(array $data): bool
    {
        return $this->autorRepository->insert($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->autorRepository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->autorRepository->delete($id);
    }
}
