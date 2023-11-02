<?php

declare(strict_types=1);

namespace Mysendingbox\Transformer;

use Mysendingbox\Model\Exception\TransformerException;
use Mysendingbox\Resource\EventResource;

class EventTransformer extends AbstractTransformer
{
    /**
     * @param array<string, mixed> $data
     * @throws TransformerException
     */
    public static function transform(array $data): EventResource
    {
        return new EventResource(
            self::getAsString($data, '_id'),
            self::getAsString($data, 'name'),
            self::getAsString($data, 'category'),
            self::getAsString($data, 'description'),
            self::getAsStringOrNull($data, 'letter'),
            self::getAsStringOrNull($data, 'postcard'),
            self::getAsStringOrNull($data, 'user'),
            self::getAsStringOrNull($data, 'webhook_last_error_message'),
            self::getAsBool($data, 'webhook_failed'),
            self::getAsBool($data, 'webhook_called'),
            self::getAsString($data, 'created_at'),
            self::getAsString($data, 'updated_at'),
        );
    }
}
