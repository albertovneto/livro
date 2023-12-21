<?php

namespace App\Repositories\Contracts;

interface AutorRepositoryContract
{
    public function get(): ?array;
    public function getById(int $id): ?array;
    public function update(int $id, array $data): bool;
    public function insert(array $data): bool;
    public function delete(int $id): bool;
}
