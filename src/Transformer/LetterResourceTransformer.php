<?php

declare(strict_types=1);

namespace Mysendingbox\Transformer;

use Mysendingbox\Model\Exception\TransformerException;
use Mysendingbox\Resource\LetterResource;

final class LetterResourceTransformer extends AbstractTransformer
{
    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function transform(array $data): LetterResource
    {
        return new LetterResource(
            self::getAsString($data, '_id'),
            self::getAsString($data, 'channel'),
            self::getAsPriceResource($data, 'price'),
            self::getAsAddressResourceOrNull($data, 'from'),
            self::getAsAddressResource($data, 'to'),
            self::getAsInt($data, 'page_count'),
            self::getAsInt($data, 'sheet_count'),
            self::getAsFileResourceOrNull($data, 'file'),
            self::getAsStringOrNull($data, 'source_file_type'),
            self::getAsString($data, 'mode'),
            self::getAsString($data, 'color'),
            self::getAsBool($data, 'both_sides'),
            self::getAsString($data, 'postage_type'),
            self::getAsString($data, 'postage_speed'),
            self::getAsIntOrNull($data, 'pdf_margin'),
            self::getAsBool($data, 'manage_delivery_proof'),
            self::getAsBool($data, 'manage_returned_mail'),
            self::getAsString($data, 'envelope_window'),
            self::getAsString($data, 'mail_provider'),
            self::getAsBool($data, 'print_sender_address'),
            self::getAsString($data, 'address_placement'),
            self::getAsString($data, 'envelope'),
            self::getAsBool($data, 'staple'),
            self::getAsString($data, 'send_date'),
            self::getAsFileResourceOrNull($data, 'delivery_proof'),
            self::getAsFileResourceOrNull($data, 'filing_proof'),
            self::getAsFileResourceOrNull($data, 'lost_proof'),
            self::getAsFileResourceOrNull($data, 'return_to_sender_proof'),
            self::getAsFileResourceOrNull($data, 'download_proof'),
            self::getAsFileResourceOrNull($data, 'rejection_proof'),
            self::getAsFileResourceOrNull($data, 'negligence_proof'),
            self::getAsTrackingEventResourceArray($data, 'tracking_events'),
            self::getAsStringOrNull($data, 'tracking_number'),
            self::getAsEventResourceArray($data, 'events'),
            self::getAsString($data, 'created_at'),
            self::getAsString($data, 'updated_at'),
            self::getAsString($data, 'user'),
            self::getAsBoolOrNull($data, 'error'),
            self::getAsBoolOrNull($data, 'wrong_address'),
            self::getAsString($data, 'created_from'),
            self::getAsString($data, 'object'),
            self::getAsStringOrNull($data, 'description'),
            self::getAsStringOrNull($data, 'content'),
            self::getAsStringOrNull($data, 'content_type'),
            self::getAsBoolOrNull($data, 'term_of_use_validation'),
            self::getAsObjectOrNull($data, 'metadata'),
            self::getAsObjectOrNull($data, 'variables')
        );
    }
}
