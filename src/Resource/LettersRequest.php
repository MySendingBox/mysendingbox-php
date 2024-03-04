<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

final class LettersRequest
{
    /**
     * @param array<LetterResource> $letters
     */
    public function __construct(
        private int $total,
        private int $limit,
        private int $offset,
        private int $count,
        private string $requestedAt,
        private array $letters,
    ) {
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getRequestedAt(): string
    {
        return $this->requestedAt;
    }

    /**
     * @return array<LetterResource>
     */
    public function getLetters(): array
    {
        return $this->letters;
    }
}
