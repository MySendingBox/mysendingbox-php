<?php

declare(strict_types=1);

namespace Mysendingbox\Transformer;

use Mysendingbox\Model\Exception\TransformerException;
use Mysendingbox\Resource\InvoicesRequest;

final class InvoicesRequestTransformer extends AbstractTransformer
{
    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function transform(array $data): InvoicesRequest
    {
        $infoData = self::getAsObject($data, 'info');

        if (!array_key_exists('invoices', $data) || !is_array($data['invoices'])) {
            throw new TransformerException(expected: 'array', value: $data['data']);
        }

        $invoices = [];
        foreach ($data['invoices'] as $datum) {
            if (!is_array($datum)) {
                throw new TransformerException(expected: 'array', value: $datum);
            }

            $invoices[] = InvoiceResourceTransformer::transform($datum);
        }

        return new InvoicesRequest(
            self::getAsInt($infoData, 'total'),
            self::getAsInt($infoData, 'limit'),
            self::getAsInt($infoData, 'page'),
            self::getAsInt($infoData, 'pages'),
            self::getAsString($infoData, 'requested_at'),
            $invoices,
        );
    }
}
