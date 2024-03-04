<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

final class AddressResource
{
    public function __construct(
        private ?string $name,
        private ?string $company,
        private ?string $line1,
        private ?string $line2,
        private ?string $line3,
        private ?string $city,
        private ?string $postalCode,
        private ?string $country,
        private ?string $status,
        private ?string $email,
        private ?string $firstName,
        private ?string $lastName,
        private ?string $replyTo,
    ) {
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function getLine1(): ?string
    {
        return $this->line1;
    }

    public function getLine2(): ?string
    {
        return $this->line2;
    }

    public function getLine3(): ?string
    {
        return $this->line3;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function getEmail(): ?string
    {
        return $this->email;
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
