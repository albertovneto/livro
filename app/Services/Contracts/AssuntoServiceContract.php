<?php

namespace App\Services\Contracts;

interface AssuntoServiceContract
{
    public function list(): ?array;
    public function update(int $id, array $data): bool;
    public function insert(array $data): bool;
    public function delete(int $id): bool;
}
