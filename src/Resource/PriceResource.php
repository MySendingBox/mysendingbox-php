<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

final class PriceResource
{
    private string $pack;
    private float $postage;
    private float $service;
    private float $total;

    public function __construct(
        string $pack,
        float $postage,
        float $service,
        float $total
    ) {
        $this->total = $total;
        $this->service = $service;
        $this->postage = $postage;
        $this->pack = $pack;
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
