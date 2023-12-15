<?php

declare(strict_types=1);

namespace Mysendingbox\Transformer;

use Mysendingbox\Model\Exception\TransformerException;
use Mysendingbox\Resource\InvoiceResource;

final class InvoiceResourceTransformer extends AbstractTransformer
{
    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function transform(array $data): InvoiceResource
    {
        return new InvoiceResource(
            self::getAsString($data, '_id'),
            self::getAsInt($data, 'invoice_number'),
            self::getAsString($data, 'invoice_date'),
            self::getAsString($data, 'due_date'),
            self::getAsStringOrNull($data, 'name'),
            self::getAsString($data, 'payment_date'),
            self::getAsString($data, 'payment_type'),
            self::getAsObject($data, 'payment_informations'),
            self::getAsInt($data, 'tva'),
            self::getAsString($data, 'country'),
            self::getAsObject($data, 'invoice_lines'),
            self::getAsObject($data, 'total'),
            self::getAsObject($data, 'discount'),
            self::getAsString($data, 'status'),
            self::getAsFileResourceOrNull($data, 'file'),
        );
    }
}
