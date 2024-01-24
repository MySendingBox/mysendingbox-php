<?php

declare(strict_types=1);

namespace Mysendingbox\Model;

final class AddressPaper implements \JsonSerializable
{
    public function __construct(
        private string $line1,
        private string $city,
        private string $postalCode,
        private string $country,
        private ?string $name = null,
        private ?string $company = null,
        private ?string $line2 = null,
        private ?string $line3 = null,
    ) {
    }

    /**
     * @return array<string, string | null>
     */
    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'company' => $this->company,
            'address_line1' => $this->line1,
            'address_line2' => $this->line2,
            'address_line3' => $this->line3,
            'address_city' => $this->city,
            'address_postalcode' => $this->postalCode,
            'address_country' => $this->country,
        ];
    }

    public function getLine1(): string
    {
        return $this->line1;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function getLine2(): ?string
    {
        return $this->line2;
    }

    public function getLine3(): ?string
    {
        return $this->line3;
    }
}
