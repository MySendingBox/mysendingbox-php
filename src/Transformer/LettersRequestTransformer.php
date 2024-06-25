<?php

declare(strict_types=1);

namespace Mysendingbox\Transformer;

use Mysendingbox\Model\Exception\TransformerException;
use Mysendingbox\Resource\LettersRequest;

final class LettersRequestTransformer extends AbstractTransformer
{
    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function transform(array $data): LettersRequest
    {
        $infoData = self::getAsObject($data, 'info');

        if (!array_key_exists('letters', $data) || !is_array($data['letters'])) {
            throw new TransformerException('data', 'array', $data['data']);
        }

        $letters = [];
        foreach ($data['letters'] as $datum) {
            if (!is_array($datum)) {
                throw new TransformerException("data[letters][$datum]", 'array', $datum);
            }

            $letters[] = LetterResourceTransformer::transform($datum);
        }

        return new LettersRequest(
            self::getAsInt($infoData, 'limit'),
            self::getAsInt($infoData, 'offset'),
            self::getAsInt($infoData, 'count'),
            self::getAsString($infoData, 'requested_at'),
            $letters,
        );
    }
}
