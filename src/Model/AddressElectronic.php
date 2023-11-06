<?php

declare(strict_types=1);

namespace Mysendingbox\Model;

use Mysendingbox\MysendingboxClient;

final class AddressElectronic implements \JsonSerializable
{
    public function __construct(
        private string $email,
        private ?string $status = MysendingboxClient::ELECTRONIC_STATUS_INDIVIDUAL,
        private ?string $company = null,
        private ?string $firstName = null,
        private ?string $lastName = null,
        private ?string $replyTo = null,
    ) {
    }

    /**
     * @return array<string, string | null>
     */
    public function jsonSerialize(): array
    {
        return [
            'company' => $this->company,
            'status' => $this->status,
            'email' => $this->email,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'reply_to' => $this->replyTo,
        ];
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getReplyTo(): ?string
    {
        return $this->replyTo;
    }
}
