<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

final class InvoicesRequest
{
    private int $limit;
    private int $page;
    private string $requestedAt;
    /**
     * @var array<InvoiceResource>
     */
    private array $invoices;

    /**
     * @param array<InvoiceResource> $invoices
     */
    public function __construct(
        int $limit,
        int $page,
        string $requestedAt,
        array $invoices
    ) {
        $this->invoices = $invoices;
        $this->requestedAt = $requestedAt;
        $this->page = $page;
        $this->limit = $limit;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getRequestedAt(): string
    {
        return $this->requestedAt;
    }

    /**
     * @return array<InvoiceResource>
     */
    public function getInvoices(): array
    {
        return $this->invoices;
    }
}
