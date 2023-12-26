<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MethodsMagicsTrait;
use \DateTime;

class Book
{
    use MethodsMagicsTrait;

    public function __construct(
        protected ?int $id,
        protected string $title = '',
        protected string $publishingCompany = '',
        protected int $edition = 1,
        protected string $publishingYear = '',
        protected string $price = '',
        protected DateTime|string $createdAt = '',
        protected DateTime|string $updatedAt = '',
    ) {
        $this->createdAt = $this->createdAt ? new DateTime($this->createdAt) : new DateTime();

        $this->validate();
    }
}
