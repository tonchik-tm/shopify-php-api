<?php

declare(strict_types=1);

namespace Shopify\Rest;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string $kind
 * @property string|null $amount
 * @property string|null $authorization
 * @property string|null $authorization_expires_at
 * @property string|null $created_at
 * @property string|null $currency
 * @property array|null $currency_exchange_adjustment
 * @property int|null $device_id
 * @property string|null $error_code
 * @property array|null $extended_authorization_attributes
 * @property string|null $gateway
 * @property int|null $id
 * @property int|null $location_id
 * @property string|null $message
 * @property int|null $order_id
 * @property int|null $parent_id
 * @property array|null $payment_details
 * @property string|null $processed_at
 * @property array|null $receipt
 * @property string|null $source_name
 * @property string|null $status
 * @property bool|null $test
 * @property int|null $user_id
 */
class Transaction extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => ["order_id"], "path" => "orders/<order_id>/transactions.json"],
        ["http_method" => "post", "operation" => "post", "ids" => ["order_id"], "path" => "orders/<order_id>/transactions.json"],
        ["http_method" => "get", "operation" => "count", "ids" => ["order_id"], "path" => "orders/<order_id>/transactions/count.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["order_id", "id"], "path" => "orders/<order_id>/transactions/<id>.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $urlIds Allowed indexes:
     *     order_id
     * @param mixed[] $params Allowed indexes:
     *     fields,
     *     in_shop_currency
     *
     * @return Transaction|null
     */
    public static function find(
        Session $session,
        $id,
        array $urlIds = [],
        array $params = []
    ): ?Transaction {
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
     *     order_id
     * @param mixed[] $params Allowed indexes:
     *     since_id,
     *     fields,
     *     in_shop_currency
     *
     * @return Transaction[]
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

    /**
     * @param Session $session
     * @param array $urlIds Allowed indexes:
     *     order_id
     * @param mixed[] $params
     *
     * @return array|null
     */
    public static function count(
        Session $session,
        array $urlIds = [],
        array $params = []
    ): ?array {
        $response = parent::request(
            "get",
            "count",
            $session,
            $urlIds,
            $params,
            [],
        );

        return $response->getDecodedBody();
    }

}
