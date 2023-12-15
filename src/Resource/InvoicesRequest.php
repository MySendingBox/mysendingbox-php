<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

final class InvoicesRequest
{
    /**
     * @param array<InvoiceResource> $invoices
     */
    public function __construct(
        private int $total,
        private int $limit,
        private int $page,
        private int $pages,
        private string $requestedAt,
        private array $invoices,
    ) {
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
