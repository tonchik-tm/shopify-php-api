<?php

declare(strict_types=1);

namespace Shopify\Rest;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string $title
 * @property string|null $body_html
 * @property string|null $handle
 * @property int|null $id
 * @property Image|null $image
 * @property string|null $published_at
 * @property string|null $published_scope
 * @property string|null $sort_order
 * @property string|null $template_suffix
 * @property string|null $updated_at
 */
class Collection extends Base
{
    protected static array $HAS_ONE = [
        "image" => Image::class
    ];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "collections/<id>.json"],
        ["http_method" => "get", "operation" => "products", "ids" => ["id"], "path" => "collections/<id>/products.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $urlIds
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return Collection|null
     */
    public static function find(
        Session $session,
        $id,
        array $urlIds = [],
        array $params = []
    ): ?Collection {
        $result = parent::baseFind(
            $session,
            array_merge(["id" => $id], $urlIds),
            $params,
        );
        return !empty($result) ? $result[0] : null;
    }

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $urlIds
     * @param mixed[] $params Allowed indexes:
     *     limit
     *
     * @return array|null
     */
    public static function products(
        Session $session,
        $id,
        array $urlIds = [],
        array $params = []
    ): ?array {
        $response = parent::request(
            "get",
            "products",
            $session,
            array_merge(["id" => $id], $urlIds),
            $params,
            [],
        );

        return $response->getDecodedBody();
    }

}
