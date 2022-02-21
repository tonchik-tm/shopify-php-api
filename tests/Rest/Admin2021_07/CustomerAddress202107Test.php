<?php

declare(strict_types=1);

namespace ShopifyTest\Rest;

use Shopify\Auth\Session;
use Shopify\Context;
use Shopify\Rest\CustomerAddress;
use ShopifyTest\BaseTestCase;
use ShopifyTest\Clients\MockRequest;

final class CustomerAddress202107Test extends BaseTestCase
{
    /** @var Session */
    private $test_session;

    public function setUp(): void
    {
        parent::setUp();

        Context::$API_VERSION = "2021-07";

        $this->test_session = new Session("session_id", "test-shop.myshopify.io", true, "1234");
        $this->test_session->setAccessToken("this_is_a_test_token");
    }

    /**

     *
     * @return void
     */
    public function test_1(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/2021-07/customers/207119551/addresses.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        CustomerAddress::all(
            $this->test_session,
            ["customer_id" => 207119551],
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_2(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/2021-07/customers/207119551/addresses.json?limit=1",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        CustomerAddress::all(
            $this->test_session,
            ["customer_id" => 207119551],
            ["limit" => 1],
        );
    }

    /**

     *
     * @return void
     */
    public function test_3(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/2021-07/customers/207119551/addresses.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["address" => ["address1" => "1 Rue des Carrieres", "address2" => "Suite 1234", "city" => "Montreal", "company" => "Fancy Co.", "first_name" => "Samuel", "last_name" => "de Champlain", "phone" => "819-555-5555", "province" => "Quebec", "country" => "Canada", "zip" => "G1R 4P5", "name" => "Samuel de Champlain", "province_code" => "QC", "country_code" => "CA", "country_name" => "Canada"]]),
            ),
        ]);

        $customer_address = new CustomerAddress($this->test_session);
        $customer_address->customer_id = 207119551;
        $customer_address->address1 = "1 Rue des Carrieres";
        $customer_address->address2 = "Suite 1234";
        $customer_address->city = "Montreal";
        $customer_address->company = "Fancy Co.";
        $customer_address->first_name = "Samuel";
        $customer_address->last_name = "de Champlain";
        $customer_address->phone = "819-555-5555";
        $customer_address->province = "Quebec";
        $customer_address->country = "Canada";
        $customer_address->zip = "G1R 4P5";
        $customer_address->name = "Samuel de Champlain";
        $customer_address->province_code = "QC";
        $customer_address->country_code = "CA";
        $customer_address->country_name = "Canada";
        $customer_address->save();
    }

    /**

     *
     * @return void
     */
    public function test_4(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/2021-07/customers/207119551/addresses/207119551.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        CustomerAddress::find(
            $this->test_session,
            207119551,
            ["customer_id" => 207119551],
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_5(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/2021-07/customers/207119551/addresses/207119551.json",
                "PUT",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["address" => ["id" => 207119551, "zip" => 90210]]),
            ),
        ]);

        $customer_address = new CustomerAddress($this->test_session);
        $customer_address->customer_id = 207119551;
        $customer_address->id = 207119551;
        $customer_address->zip = 90210;
        $customer_address->save();
    }

    /**

     *
     * @return void
     */
    public function test_6(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/2021-07/customers/207119551/addresses/1053317335.json",
                "DELETE",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        CustomerAddress::delete(
            $this->test_session,
            1053317335,
            ["customer_id" => 207119551],
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_7(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/2021-07/customers/207119551/addresses/set.json?address_ids%5B%5D=1053317336&operation=destroy",
                "PUT",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        $customer_address = new CustomerAddress($this->test_session);
        $customer_address->customer_id = 207119551;
        $customer_address->set(
            ["address_ids" => [1053317336], "operation" => "destroy"],
        );
    }

    /**

     *
     * @return void
     */
    public function test_8(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/2021-07/customers/207119551/addresses/1053317337/default.json",
                "PUT",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        $customer_address = new CustomerAddress($this->test_session);
        $customer_address->customer_id = 207119551;
        $customer_address->id = 1053317337;
        $customer_address->default(
            [],
        );
    }

}
