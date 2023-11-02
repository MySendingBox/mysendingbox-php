<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

class FileResource
{
    public function __construct(
        private string $_id,
        private string $url,
        private ?string $user,
        private ?string $postcard,
        private ?string $letter,
        private string $type,
        private int $pageCount,
        private string $createdAt,
        private string $updatedAt,
    ) {
    }

    public function getId(): string
    {
        return $this->_id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function getPostcard(): ?string
    {
        return $this->postcard;
    }

    public function getLetter(): ?string
    {
        return $this->letter;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getPageCount(): int
    {
        return $this->pageCount;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }
}
