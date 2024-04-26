<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

class UserResource
{
    /**
     * @var array<string, mixed>
     */
    private array $emailNotifications;
    private bool $admin;
    private bool $activated;
    private string $id;
    private string $email;
    private string $name;
    private ?string $phone;
    private string $role;
    private bool $invitePending;
    private string $inviteToken;
    private string $company;
    private string $createdAt;
    private string $updatedAt;

    /**
     * @param array<string, mixed> $emailNotifications
     */
    public function __construct(
        array $emailNotifications,
        bool $admin,
        bool $activated,
        string $id,
        string $email,
        string $name,
        ?string $phone,
        string $role,
        bool $invitePending,
        string $inviteToken,
        string $company,
        string $createdAt,
        string $updatedAt
    ) {
        $this->updatedAt = $updatedAt;
        $this->createdAt = $createdAt;
        $this->company = $company;
        $this->inviteToken = $inviteToken;
        $this->invitePending = $invitePending;
        $this->role = $role;
        $this->phone = $phone;
        $this->name = $name;
        $this->email = $email;
        $this->id = $id;
        $this->activated = $activated;
        $this->admin = $admin;
        $this->emailNotifications = $emailNotifications;
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
