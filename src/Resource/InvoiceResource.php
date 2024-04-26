<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

class InvoiceResource
{
    private string $id;
    private int $invoiceNumber;
    private string $invoiceDate;
    private string $dueDate;
    private ?string $name;
    private string $paymentDate;
    private string $paymentType;
    /**
     * @var array<string, mixed>
     */
    private array $paymentInformations;
    private int $tva;
    private string $country;
    /**
     * @var array<string, mixed>
     */
    private array $invoiceLines;
    /**
     * @var array<string, mixed>
     */
    private array $total;
    /**
     * @var array<string, mixed>
     */
    private array $discount;
    private string $status;
    /**
     * @var FileResource|string|null
     */
    private $file;

    /**
     * @param array<string, mixed> $paymentInformations
     * @param array<string, mixed> $invoiceLines
     * @param array<string, mixed> $total
     * @param array<string, mixed> $discount
     * @param FileResource|string|null $file
     */
    public function __construct(
        string $id,
        int $invoiceNumber,
        string $invoiceDate,
        string $dueDate,
        ?string $name,
        string $paymentDate,
        string $paymentType,
        array $paymentInformations,
        int $tva,
        string $country,
        array $invoiceLines,
        array $total,
        array $discount,
        string $status,
        $file
    ) {
        $this->file = $file;
        $this->status = $status;
        $this->discount = $discount;
        $this->total = $total;
        $this->invoiceLines = $invoiceLines;
        $this->country = $country;
        $this->tva = $tva;
        $this->paymentInformations = $paymentInformations;
        $this->paymentType = $paymentType;
        $this->paymentDate = $paymentDate;
        $this->name = $name;
        $this->dueDate = $dueDate;
        $this->invoiceDate = $invoiceDate;
        $this->invoiceNumber = $invoiceNumber;
        $this->id = $id;
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

    /**
     * @return FileResource|string|null
     */
    public function getFile()
    {
        return $this->file;
    }
}
