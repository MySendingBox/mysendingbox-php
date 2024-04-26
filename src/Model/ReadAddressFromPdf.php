<?php

declare(strict_types=1);

namespace Mysendingbox\Model;

final class ReadAddressFromPdf implements \JsonSerializable
{
    private bool $active;
    private int $x;
    private int $y;
    private int $width;
    private int $height;

    public function __construct(
        bool $active,
        int $x,
        int $y,
        int $width,
        int $height
    ) {
        $this->height = $height;
        $this->width = $width;
        $this->y = $y;
        $this->x = $x;
        $this->active = $active;
    }

    /**
     * @return array<string, bool | int>
     */
    public function jsonSerialize(): array
    {
        return [
            'active' => $this->active,
            'x' => $this->x,
            'y' => $this->y,
            'width' => $this->width,
            'height' => $this->height,
        ];
    }

    public function getActive(): bool
    {
        return $this->active;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }
}
