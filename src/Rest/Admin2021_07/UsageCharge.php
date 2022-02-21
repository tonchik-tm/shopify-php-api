<?php

declare(strict_types=1);

namespace Shopify\Rest;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $created_at
 * @property string|null $description
 * @property int|null $id
 * @property int|null $price
 * @property int|null $recurring_application_charge_id
 * @property string|null $updated_at
 */
class UsageCharge extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "post", "operation" => "post", "ids" => ["recurring_application_charge_id"], "path" => "recurring_application_charges/<recurring_application_charge_id>/usage_charges.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["recurring_application_charge_id"], "path" => "recurring_application_charges/<recurring_application_charge_id>/usage_charges.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["recurring_application_charge_id", "id"], "path" => "recurring_application_charges/<recurring_application_charge_id>/usage_charges/<id>.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $urlIds Allowed indexes:
     *     recurring_application_charge_id
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return UsageCharge|null
     */
    public static function find(
        Session $session,
        $id,
        array $urlIds = [],
        array $params = []
    ): ?UsageCharge {
        $result = parent::baseFind(
            $session,
            array_merge(["id" => $id], $urlIds),
            $params,
        );
        return !empty($result) ? $result[0] : null;
    }

    /**
     * @param Session $session
     * @param array $urlIds Allowed indexes:
     *     recurring_application_charge_id
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return UsageCharge[]
     */
    public static function all(
        Session $session,
        array $urlIds = [],
        array $params = []
    ): array {
        return parent::baseFind(
            $session,
            $urlIds,
            $params,
        );
    }

}
