<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

final class AddressResource
{
    private ?string $name;
    private ?string $company;
    private ?string $line1;
    private ?string $line2;
    private ?string $line3;
    private ?string $city;
    private ?string $postalCode;
    private ?string $country;
    private ?string $status;
    private ?string $email;
    private ?string $firstName;
    private ?string $lastName;
    private ?string $replyTo;

    public function __construct(
        ?string $name,
        ?string $company,
        ?string $line1,
        ?string $line2,
        ?string $line3,
        ?string $city,
        ?string $postalCode,
        ?string $country,
        ?string $status,
        ?string $email,
        ?string $firstName,
        ?string $lastName,
        ?string $replyTo
    ) {
        $this->replyTo = $replyTo;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->email = $email;
        $this->status = $status;
        $this->country = $country;
        $this->postalCode = $postalCode;
        $this->city = $city;
        $this->line3 = $line3;
        $this->line2 = $line2;
        $this->line1 = $line1;
        $this->company = $company;
        $this->name = $name;
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
