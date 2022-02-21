<?php

declare(strict_types=1);

namespace Shopify\Rest;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string $handle
 * @property array[]|null $access_scopes
 */
class AccessScope extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static ?string $CUSTOM_PREFIX = "/admin/oauth";
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "access_scopes.json"]
    ];

    /**
     * @param Session $session
     * @param array $urlIds
     * @param mixed[] $params
     *
     * @return AccessScope[]
     */
    public static function all(
        Session $session,
        array $urlIds = [],
        array $params = []
    ): array {
        return parent::baseFind(
            $session,
            [],
            $params,
        );
    }

}
