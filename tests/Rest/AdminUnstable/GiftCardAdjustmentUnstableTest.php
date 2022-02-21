<?php

declare(strict_types=1);

namespace ShopifyTest\Rest;

use Shopify\Auth\Session;
use Shopify\Context;
use Shopify\Rest\GiftCardAdjustment;
use ShopifyTest\BaseTestCase;
use ShopifyTest\Clients\MockRequest;

final class GiftCardAdjustmentUnstableTest extends BaseTestCase
{
    /** @var Session */
    private $test_session;

    public function setUp(): void
    {
        parent::setUp();

        Context::$API_VERSION = "unstable";

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
                "https://test-shop.myshopify.io/admin/api/unstable/gift_cards/1035197676/adjustments.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        GiftCardAdjustment::all(
            $this->test_session,
            ["gift_card_id" => 1035197676],
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
                "https://test-shop.myshopify.io/admin/api/unstable/gift_cards/1035197676/adjustments.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["adjustment" => ["amount" => 10.0, "note" => "Customer refilled gift card by $10"]]),
            ),
        ]);

        $gift_card_adjustment = new GiftCardAdjustment($this->test_session);
        $gift_card_adjustment->gift_card_id = 1035197676;
        $gift_card_adjustment->amount = 10.0;
        $gift_card_adjustment->note = "Customer refilled gift card by $10";
        $gift_card_adjustment->save();
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
                "https://test-shop.myshopify.io/admin/api/unstable/gift_cards/1035197676/adjustments.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["adjustment" => ["amount" => -20.0, "note" => "Customer spent $20 via external service"]]),
            ),
        ]);

        $gift_card_adjustment = new GiftCardAdjustment($this->test_session);
        $gift_card_adjustment->gift_card_id = 1035197676;
        $gift_card_adjustment->amount = -20.0;
        $gift_card_adjustment->note = "Customer spent $20 via external service";
        $gift_card_adjustment->save();
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
                "https://test-shop.myshopify.io/admin/api/unstable/gift_cards/1035197676/adjustments.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["adjustment" => ["amount" => 10.0, "remote_transaction_ref" => "gift_card_app_transaction_193402", "remote_transaction_url" => "http://example.com/my-gift-card-app/gift_card_adjustments/193402"]]),
            ),
        ]);

        $gift_card_adjustment = new GiftCardAdjustment($this->test_session);
        $gift_card_adjustment->gift_card_id = 1035197676;
        $gift_card_adjustment->amount = 10.0;
        $gift_card_adjustment->remote_transaction_ref = "gift_card_app_transaction_193402";
        $gift_card_adjustment->remote_transaction_url = "http://example.com/my-gift-card-app/gift_card_adjustments/193402";
        $gift_card_adjustment->save();
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
                "https://test-shop.myshopify.io/admin/api/unstable/gift_cards/1035197676/adjustments.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["adjustment" => ["amount" => 10.0, "processed_at" => "2021-08-03T16:57:35-04:00"]]),
            ),
        ]);

        $gift_card_adjustment = new GiftCardAdjustment($this->test_session);
        $gift_card_adjustment->gift_card_id = 1035197676;
        $gift_card_adjustment->amount = 10.0;
        $gift_card_adjustment->processed_at = "2021-08-03T16:57:35-04:00";
        $gift_card_adjustment->save();
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
                "https://test-shop.myshopify.io/admin/api/unstable/gift_cards/1035197676/adjustments/9.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        GiftCardAdjustment::find(
            $this->test_session,
            9,
            ["gift_card_id" => 1035197676],
            [],
        );
    }

}
