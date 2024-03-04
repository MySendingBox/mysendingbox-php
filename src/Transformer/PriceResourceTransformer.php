<?php

declare(strict_types=1);

namespace Mysendingbox\Transformer;

use Mysendingbox\Model\Exception\TransformerException;
use Mysendingbox\Resource\PriceResource;

final class PriceResourceTransformer extends AbstractTransformer
{
    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function transform(array $data): PriceResource
    {
        return new PriceResource(
            self::getAsString($data, 'pack'),
            self::getAsNumber($data, 'postage'),
            self::getAsNumber($data, 'service'),
            self::getAsNumber($data, 'total'),
        );
    }
}
