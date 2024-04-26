<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

final class LettersRequest
{
    private int $total;
    private int $limit;
    private int $offset;
    private int $count;
    private string $requestedAt;
    /**
     * @var array<LetterResource>
     */
    private array $letters;

    /**
     * @param array<LetterResource> $letters
     */
    public function __construct(
        int $total,
        int $limit,
        int $offset,
        int $count,
        string $requestedAt,
        array $letters
    ) {
        $this->letters = $letters;
        $this->requestedAt = $requestedAt;
        $this->count = $count;
        $this->offset = $offset;
        $this->limit = $limit;
        $this->total = $total;
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
