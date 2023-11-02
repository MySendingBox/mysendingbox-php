<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

class PriceResource
{
    public function __construct(
        private string $pack,
        private float $postage,
        private float $service,
        private float $total,
    ) {
    }

    public function getPack(): string
    {
        return $this->pack;
    }

    public function getPostage(): float
    {
        return $this->postage;
    }

    public function getService(): float
    {
        return $this->service;
    }

    public function getTotal(): float
    {
        return $this->total;
    }
}
