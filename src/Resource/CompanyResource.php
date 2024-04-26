<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

class CompanyResource
{
    /**
     * @var array<string, mixed>
     */
    private array $partner;
    private ?AddressResource $addressResource;
    /**
     * @var array<string, mixed>
     */
    private array $emailNotifications;
    /**
     * @var array<string, mixed>
     */
    private array $dataExpiration;
    /**
     * @var array<string, mixed>
     */
    private array $cancellationWindow;
    /**
     * @var array<string, mixed>
     */
    private array $apiKeys;
    /**
     * @var array<string, mixed>
     */
    private array $integrations;
    private bool $admin;
    private bool $activated;
    private bool $disableWebhookForDashboardEvent;
    private string $postageSpeed;
    private bool $creditCardExists;
    private string $defaultPack;
    private bool $autoInvoicing;
    /**
     * @var array<string>
     */
    private array $billingEmails;
    private string $id;
    private ?string $brandedFor;
    private ?string $webhookUrl;
    private string $email;
    private ?string $siren;
    private ?string $tvaIntra;
    private string $createdAt;
    private string $updatedAt;

    /**
     * @param array<string, mixed> $apiKeys
     * @param array<string> $billingEmails
     * @param array<string, mixed> $cancellationWindow
     * @param array<string, mixed> $dataExpiration
     * @param array<string, mixed> $emailNotifications
     * @param array<string, mixed> $integrations
     * @param array<string, mixed> $partner
     */
    public function __construct(
        array $partner,
        ?AddressResource $addressResource,
        array $emailNotifications,
        array $dataExpiration,
        array $cancellationWindow,
        array $apiKeys,
        array $integrations,
        bool $admin,
        bool $activated,
        bool $disableWebhookForDashboardEvent,
        string $postageSpeed,
        bool $creditCardExists,
        string $defaultPack,
        bool $autoInvoicing,
        array $billingEmails,
        string $id,
        ?string $brandedFor,
        ?string $webhookUrl,
        string $email,
        ?string $siren,
        ?string $tvaIntra,
        string $createdAt,
        string $updatedAt
    ) {
        $this->updatedAt = $updatedAt;
        $this->createdAt = $createdAt;
        $this->tvaIntra = $tvaIntra;
        $this->siren = $siren;
        $this->email = $email;
        $this->webhookUrl = $webhookUrl;
        $this->brandedFor = $brandedFor;
        $this->id = $id;
        $this->billingEmails = $billingEmails;
        $this->autoInvoicing = $autoInvoicing;
        $this->defaultPack = $defaultPack;
        $this->creditCardExists = $creditCardExists;
        $this->postageSpeed = $postageSpeed;
        $this->disableWebhookForDashboardEvent = $disableWebhookForDashboardEvent;
        $this->activated = $activated;
        $this->admin = $admin;
        $this->integrations = $integrations;
        $this->apiKeys = $apiKeys;
        $this->cancellationWindow = $cancellationWindow;
        $this->dataExpiration = $dataExpiration;
        $this->emailNotifications = $emailNotifications;
        $this->addressResource = $addressResource;
        $this->partner = $partner;
    }

    /**
     * @return array<string, mixed>
     */
    public function getPartner(): array
    {
        return $this->partner;
    }

    public function getAddressResource(): ?AddressResource
    {
        return $this->addressResource;
    }

    /**
     * @return array<string, mixed>
     */
    public function getEmailNotifications(): array
    {
        return $this->emailNotifications;
    }

    /**
     * @return array<string, mixed>
     */
    public function getDataExpiration(): array
    {
        return $this->dataExpiration;
    }

    /**
     * @return array<string, mixed>
     */
    public function getCancellationWindow(): array
    {
        return $this->cancellationWindow;
    }

    /**
     * @return array<string, mixed>
     */
    public function getApiKeys(): array
    {
        return $this->apiKeys;
    }

    /**
     * @return array<string, mixed>
     */
    public function getIntegrations(): array
    {
        return $this->integrations;
    }

    public function isAdmin(): bool
    {
        return $this->admin;
    }

    public function isActivated(): bool
    {
        return $this->activated;
    }

    public function isDisableWebhookForDashboardEvent(): bool
    {
        return $this->disableWebhookForDashboardEvent;
    }

    public function getPostageSpeed(): string
    {
        return $this->postageSpeed;
    }

    public function isCreditCardExists(): bool
    {
        return $this->creditCardExists;
    }

    public function getDefaultPack(): string
    {
        return $this->defaultPack;
    }

    public function isAutoInvoicing(): bool
    {
        return $this->autoInvoicing;
    }

    /**
     * @return array<string>
     */
    public function getBillingEmails(): array
    {
        return $this->billingEmails;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getBrandedFor(): ?string
    {
        return $this->brandedFor;
    }

    public function getWebhookUrl(): ?string
    {
        return $this->webhookUrl;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSiren(): ?string
    {
        return $this->siren;
    }

    public function getTvaIntra(): ?string
    {
        return $this->tvaIntra;
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
