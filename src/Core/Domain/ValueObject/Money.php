<?php

namespace Core\Domain\ValueObject;

class Money
{
    public function __construct(
        protected int $amount,
        protected string $currency = 'BRL',
    ) {
    }

    public function amount(): int
    {
        return $this->amount;
    }
}

