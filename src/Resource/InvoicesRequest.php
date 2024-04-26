<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

final class InvoicesRequest
{
    private int $total;
    private int $limit;
    private int $page;
    private int $pages;
    private string $requestedAt;
    /**
     * @var array<InvoiceResource>
     */
    private array $invoices;

    /**
     * @param array<InvoiceResource> $invoices
     */
    public function __construct(
        int $total,
        int $limit,
        int $page,
        int $pages,
        string $requestedAt,
        array $invoices
    ) {
        $this->invoices = $invoices;
        $this->requestedAt = $requestedAt;
        $this->pages = $pages;
        $this->page = $page;
        $this->limit = $limit;
        $this->total = $total;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getPages(): int
    {
        return $this->pages;
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
