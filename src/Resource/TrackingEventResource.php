<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

final class TrackingEventResource
{
    public function __construct(
        private string $id,
        private string $status,
        private string $message,
        private string $date,
        private string $createdAt,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
}
