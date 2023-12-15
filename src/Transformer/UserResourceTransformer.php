<?php

declare(strict_types=1);

namespace Mysendingbox\Transformer;

use Mysendingbox\Model\Exception\TransformerException;
use Mysendingbox\Resource\UserResource;

final class UserResourceTransformer extends AbstractTransformer
{
    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function transform(array $data): UserResource
    {
        return new UserResource(
            self::getAsObject($data, 'email_notifications'),
            self::getAsBool($data, 'admin'),
            self::getAsBool($data, 'activated'),
            self::getAsString($data, '_id'),
            self::getAsString($data, 'email'),
            self::getAsString($data, 'name'),
            self::getAsStringOrNull($data, 'phone'),
            self::getAsString($data, 'role'),
            self::getAsBool($data, 'invite_pending'),
            self::getAsString($data, 'invite_token'),
            self::getAsString($data, 'company'),
            self::getAsString($data, 'created_at'),
            self::getAsString($data, 'updated_at'),
        );
    }
}
