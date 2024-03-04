<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

class UserResource
{
    /**
     * @param array<string, mixed> $emailNotifications
     */
    public function __construct(
        private array $emailNotifications,
        private bool $admin,
        private bool $activated,
        private string $id,
        private string $email,
        private string $name,
        private ?string $phone,
        private string $role,
        private bool $invitePending,
        private string $inviteToken,
        private string $company,
        private string $createdAt,
        private string $updatedAt,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function getEmailNotifications(): array
    {
        return $this->emailNotifications;
    }

    public function isAdmin(): bool
    {
        return $this->admin;
    }

    public function isActivated(): bool
    {
        return $this->activated;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function isInvitePending(): bool
    {
        return $this->invitePending;
    }

    public function getInviteToken(): string
    {
        return $this->inviteToken;
    }

    public function getCompany(): string
    {
        return $this->company;
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
