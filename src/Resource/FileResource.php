<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

final class FileResource
{
    private string $_id;
    private string $url;
    private ?string $user;
    private ?string $postcard;
    private ?string $letter;
    private string $type;
    private int $pageCount;
    private string $createdAt;
    private string $updatedAt;

    public function __construct(
        string $_id,
        string $url,
        ?string $user,
        ?string $postcard,
        ?string $letter,
        string $type,
        int $pageCount,
        string $createdAt,
        string $updatedAt
    ) {
        $this->updatedAt = $updatedAt;
        $this->createdAt = $createdAt;
        $this->pageCount = $pageCount;
        $this->type = $type;
        $this->letter = $letter;
        $this->postcard = $postcard;
        $this->user = $user;
        $this->url = $url;
        $this->_id = $_id;
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
