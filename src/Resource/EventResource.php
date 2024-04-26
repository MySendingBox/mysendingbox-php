<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

final class EventResource
{
    private string $id;
    private string $name;
    private string $category;
    private string $description;
    private ?string $letter;
    private ?string $postcard;
    private ?string $user;
    private ?string $webhookLastErrorMessage;
    private bool $webhookFailed;
    private bool $webhookCalled;
    private string $createdAt;
    private string $updatedAt;

    public function __construct(
        string $id,
        string $name,
        string $category,
        string $description,
        ?string $letter,
        ?string $postcard,
        ?string $user,
        ?string $webhookLastErrorMessage,
        bool $webhookFailed,
        bool $webhookCalled,
        string $createdAt,
        string $updatedAt
    ) {
        $this->updatedAt = $updatedAt;
        $this->createdAt = $createdAt;
        $this->webhookCalled = $webhookCalled;
        $this->webhookFailed = $webhookFailed;
        $this->webhookLastErrorMessage = $webhookLastErrorMessage;
        $this->user = $user;
        $this->postcard = $postcard;
        $this->letter = $letter;
        $this->description = $description;
        $this->category = $category;
        $this->name = $name;
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getLetter(): ?string
    {
        return $this->letter;
    }

    public function getPostcard(): ?string
    {
        return $this->postcard;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function getWebhookLastErrorMessage(): ?string
    {
        return $this->webhookLastErrorMessage;
    }

    public function isWebhookFailed(): bool
    {
        return $this->webhookFailed;
    }

    public function isWebhookCalled(): bool
    {
        return $this->webhookCalled;
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
