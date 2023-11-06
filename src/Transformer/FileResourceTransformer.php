<?php

declare(strict_types=1);

namespace Mysendingbox\Transformer;

use Mysendingbox\Model\Exception\TransformerException;
use Mysendingbox\Resource\FileResource;

final class FileResourceTransformer extends AbstractTransformer
{
    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function transform(array $data): FileResource
    {
        return new FileResource(
            self::getAsString($data, '_id'),
            self::getAsString($data, 'url'),
            self::getAsStringOrNull($data, 'user'),
            self::getAsStringOrNull($data, 'postcard'),
            self::getAsStringOrNull($data, 'letter'),
            self::getAsString($data, 'type'),
            self::getAsInt($data, 'page_count'),
            self::getAsString($data, 'created_at'),
            self::getAsString($data, 'updated_at'),
        );
    }
}
