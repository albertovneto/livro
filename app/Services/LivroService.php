<?php

namespace App\Services;

use App\Repositories\Contracts\LivroRepositoryContract;
use App\Services\Contracts\LivroServiceContract;
use Brick\Money\Money;

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
        $data['preco'] = $this->currencyFormat($data['preco']);
        return $this->livroRepository->insert($data);
    }

    public function update(int $id, array $data): bool
    {
        $data['preco'] = $this->currencyFormat($data['preco']);
        return $this->livroRepository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->livroRepository->delete($id);
    }

    protected function currencyFormat($currency): float
    {
        $currency = str_replace('.', '', $currency);
        $currency = str_replace(',', '.', $currency);
        return (float) str_replace('R$ ', '', $currency);
    }
}
