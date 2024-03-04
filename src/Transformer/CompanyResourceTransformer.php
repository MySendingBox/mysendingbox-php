<?php

declare(strict_types=1);

namespace Mysendingbox\Transformer;

use Mysendingbox\Model\Exception\TransformerException;
use Mysendingbox\Resource\CompanyResource;

final class CompanyResourceTransformer extends AbstractTransformer
{
    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function transform(array $data): CompanyResource
    {
        return new CompanyResource(
            self::getAsObject($data, 'partner'),
            self::getAsAddressResourceOrNull($data, 'address'),
            self::getAsObject($data, 'email_notifications'),
            self::getAsObject($data, 'data_expiration'),
            self::getAsObject($data, 'cancellation_window'),
            self::getAsObject($data, 'api_keys'),
            self::getAsObject($data, 'integrations'),
            self::getAsBool($data, 'admin'),
            self::getAsBool($data, 'activated'),
            self::getAsBool($data, 'disable_webhook_for_dashboard_event'),
            self::getAsString($data, 'postage_speed'),
            self::getAsBool($data, 'credit_card_exists'),
            self::getAsString($data, 'default_pack'),
            self::getAsBool($data, 'auto_invoicing'),
            self::getAsArray($data, 'billing_emails'),
            self::getAsString($data, '_id'),
            self::getAsStringOrNull($data, 'branded_for'),
            self::getAsStringOrNull($data, 'webhook_url'),
            self::getAsString($data, 'email'),
            self::getAsStringOrNull($data, 'siren'),
            self::getAsStringOrNull($data, 'tva_intra'),
            self::getAsString($data, 'created_at'),
            self::getAsString($data, 'updated_at'),
        );
    }
}
