<?php

declare(strict_types=1);

namespace Mysendingbox\Transformer;

use Mysendingbox\Model\Exception\TransformerException;
use Mysendingbox\Resource\AccountResource;

class AccountResourceTransformer extends AbstractTransformer
{
    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function transform(array $data): AccountResource
    {
        return new AccountResource(
            self::getAsUserResource($data, 'user'),
            self::getAsCompanyResource($data, 'company')
        );
    }
}
