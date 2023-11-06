<?php

declare(strict_types=1);

namespace Mysendingbox\Transformer;

use Mysendingbox\Model\Exception\TransformerException;
use Mysendingbox\Resource\TrackingEventResource;

final class TrackingEventTransformer extends AbstractTransformer
{
    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function transform(array $data): TrackingEventResource
    {
        return new TrackingEventResource(
            self::getAsString($data, '_id'),
            self::getAsString($data, 'status'),
            self::getAsString($data, 'message'),
            self::getAsString($data, 'date'),
            self::getAsString($data, 'created_at'),
        );
    }
}
