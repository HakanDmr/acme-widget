<?php

namespace acme\service;

use acme\sale\helper\SessionHelper;

require_once("app/helper/SessionHelper.php");
require_once("app/service/ProductService.php");
require_once("app/service/OrderService.php");

/**
 * Basket Service
 *
 * @version   0.1
 * @copyright Acme Widget Co.
 */
class BasketService
{
    private ProductService $productService;
    private OrderService   $orderService;
    private array          $basket;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productService = new ProductService();
        $this->orderService   = new OrderService();
        /**
         * Array Structure:
         * [
         *  "<productId>" => "<productCount"
         * ]
         */
        $this->basket = array();
    }

    /**
     * Add new product to basket
     *
     * @param string $productCode
     *
     * @return bool
     */
    public function add(string $productCode): bool
    {
        if (strlen($productCode) >= 1) {
            // Get Product
            $product = $this->productService->getProductByCode($productCode);

            if (null !== $product) {
                // Check product exist in basket
                if (!array_key_exists($product->getId(), $this->basket)) {
                    $this->basket[$product->getId()] = 1;
                } else {
                    // Product exist: increase product count +1
                    $this->basket[$product->getId()] += 1;
                }

                // Save Basket
                if (SessionHelper::isRecordExists("basket")) {
                    $saveBasket = SessionHelper::updateRecord("basket", $this->basket);
                } else {
                    $saveBasket = SessionHelper::addNewRecord("basket", $this->basket);
                }

                if (true === $saveBasket) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Calculate basket for total cost
     *
     * @return float|null
     */
    public function calculateBasket(): ?float
    {
        // Get basket
        $getBasket = SessionHelper::getRecord("basket");

        // Get products in the order for calculation
        //TODO: This order id should be auto-increased in product system
        return $this->orderService->order(1, $getBasket);
    }
}