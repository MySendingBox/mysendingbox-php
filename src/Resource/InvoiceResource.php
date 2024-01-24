<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

class InvoiceResource
{
    /**
     * @param array<string, mixed> $paymentInformations
     * @param array<string, mixed> $invoiceLines
     * @param array<string, mixed> $total
     * @param array<string, mixed> $discount
     */
    public function __construct(
        private string $id,
        private int $invoiceNumber,
        private string $invoiceDate,
        private string $dueDate,
        private ?string $name,
        private string $paymentDate,
        private string $paymentType,
        private array $paymentInformations,
        private int $tva,
        private string $country,
        private array $invoiceLines,
        private array $total,
        private array $discount,
        private string $status,
        private FileResource|string|null $file,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getInvoiceNumber(): int
    {
        return $this->invoiceNumber;
    }

    public function getInvoiceDate(): string
    {
        return $this->invoiceDate;
    }

    public function getDueDate(): string
    {
        return $this->dueDate;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getPaymentDate(): string
    {
        return $this->paymentDate;
    }

    public function getPaymentType(): string
    {
        return $this->paymentType;
    }

    /**
     * @return array<string, mixed>
     */
    public function getPaymentInformations(): array
    {
        return $this->paymentInformations;
    }

    public function getTva(): int
    {
        return $this->tva;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return array<string, mixed>
     */
    public function getInvoiceLines(): array
    {
        return $this->invoiceLines;
    }

    /**
     * @return array<string, mixed>
     */
    public function getTotal(): array
    {
        return $this->total;
    }

    /**
     * @return array<string, mixed>
     */
    public function getDiscount(): array
    {
        return $this->discount;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getFile(): string|FileResource|null
    {
        return $this->file;
    }
}
