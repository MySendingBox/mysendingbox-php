<?php

declare(strict_types=1);

namespace Mysendingbox\Model\Exception;

use Exception;

final class TransformerException extends Exception
{
    public function __construct(
        string $field = 'unspecified',
        string $expected = 'unspecified',
        mixed $value = null,
        int $code = 0,
        ?\Throwable $previous = null
    ) {
        parent::__construct(
            sprintf(
                'An issue occured during transformation, field %s expects %s and got %s',
                $field,
                $expected,
                is_object($value) ? $value::class : gettype($value)
            ),
            $code,
            $previous
        );
    }
}
