<?php

namespace App\Services;

use App\Repositories\Contracts\AssuntoRepositoryContract;
use App\Services\Contracts\AssuntoServiceContract;

class AssuntoService implements AssuntoServiceContract
{
    public function __construct(
        private AssuntoRepositoryContract $assuntoRepository
    ) {
    }

    public function list(): ?array
    {
        return $this->assuntoRepository->get();
    }

    public function listById(int $id): ?array
    {
        return $this->assuntoRepository->getById($id);
    }

    public function insert(array $data): bool
    {
        return $this->assuntoRepository->insert($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->assuntoRepository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->assuntoRepository->delete($id);
    }
}
