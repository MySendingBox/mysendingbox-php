<?php

declare(strict_types=1);

namespace Mysendingbox\Transformer;

use Mysendingbox\Model\Exception\TransformerException;
use Mysendingbox\Resource\AddressResource;

class AddressResourceTransformer extends AbstractTransformer
{
    /**
     * @param array<string, mixed> $data
     * @throws TransformerException
     */
    public static function transform(array $data): AddressResource
    {
        return new AddressResource(
            self::getAsStringOrNull($data, 'name'),
            self::getAsStringOrNull($data, 'company'),
            self::getAsStringOrNull($data, 'address_line1'),
            self::getAsStringOrNull($data, 'address_line2'),
            self::getAsStringOrNull($data, 'address_line3'),
            self::getAsStringOrNull($data, 'address_city'),
            self::getAsStringOrNull($data, 'address_postalcode'),
            self::getAsStringOrNull($data, 'address_country'),
            self::getAsStringOrNull($data, 'status'),
            self::getAsStringOrNull($data, 'email'),
            self::getAsStringOrNull($data, 'first_name'),
            self::getAsStringOrNull($data, 'last_name'),
            self::getAsStringOrNull($data, 'reply_to'),
        );
    }
}
