<?php

namespace acme\service;

use acme\model\OrderModel;
use acme\model\SpecialOfferModel;
use acme\repository\SpecialOfferRepository;
use acme\sale\helper\DataLoaderHelper;
use LogicException;

require_once("app/model/OrderModel.php");
require_once("app/helper/DataLoaderHelper.php");
require_once("app/service/ProductService.php");
require_once("app/repository/SpecialOfferRepository.php");

/**
 * Basket Service
 *
 * @version   0.1
 * @copyright Acme Widget Co.
 */
class OrderService
{
    private SpecialOfferRepository $specialOfferRepository;
    private ProductService         $productService;

    public function __construct()
    {
        // Init Required Models & Services
        $this->productService = new ProductService();

        // Load Demo Special Offers
        $dataLoader    = new DataLoaderHelper();
        $specialOffers = $dataLoader->getSpecialOffers();

        // Add all special offers to repository
        $this->specialOfferRepository = new SpecialOfferRepository();
        foreach ($specialOffers as $specialOffer) {
            $this->specialOfferRepository->addSpecialOffer($specialOffer);
        }
    }

    /**
     * Get special offer by product id
     *
     * @param int $productId
     *
     * @return SpecialOfferModel|null
     */
    private function getSpecialOfferByProductId(int $productId): ?SpecialOfferModel
    {
        if (count($this->specialOfferRepository->getSpecialOffers()) >= 1) {
            foreach ($this->specialOfferRepository->getSpecialOffers() as $specialOffer) {
                if ($specialOffer->getProductId() === $productId) {
                    return $specialOffer;
                }
            }
        }

        return null;
    }

    /**
     * Create new order
     *
     * @param int   $orderId
     * @param array $basket
     *
     * @return float|null
     */
    public function order(int $orderId, array $basket): ?float
    {
        $orders = array();

        foreach ($basket as $productId => $productCount) {
            // Get Product
            $product = $this->productService->getProductById($productId);

            if (null !== $product) {
                // Create Order
                $order = new OrderModel();
                $order->setId($orderId)
                      ->setProductId($product->getId())
                      ->setProductPrice($product->getPrice());

                // Check Special Offer for product
                $specialOfferModel = $this->getSpecialOfferByProductId($product->getId());

                if (null !== $specialOfferModel && $productCount >= $specialOfferModel->getProductCountForDiscount()) {
                    // Calculate product count for discount
                    $mod                  = $productCount % $specialOfferModel->getProductCountForDiscount();
                    $productDiscountCount = ($productCount - $mod) / $specialOfferModel->getProductCountForDiscount();
                    // Calculate discount amount
                    $totalDiscountAmount = $this->calculateProductPriceBySpecialOffer(
                            $specialOfferModel->getDiscountRate(), $product->getPrice()) * $productDiscountCount;
                    // Set Special Offer Id and total discount amount
                    $order->setSpecialOfferId($specialOfferModel->getId());
                    $order->setTotalDiscountAmount($totalDiscountAmount);
                }

                // Calculate Total Costs
                $totalCosts      = $product->getPrice() * $productCount;
                $discountedCosts = $totalCosts;
                if ($order->getTotalDiscountAmount() >= 0.1) {
                    $discountedCosts = $totalCosts - $order->getTotalDiscountAmount();
                }

                // Order Cost
                $order->setOrderCost($discountedCosts);

                // Add order to list for post-calculations
                $orders[] = $order;
            } else {
                return null;
            }
        }

        // Calculate Total Order Cost for Delivery Discounts
        if (!empty($orders)) {
            $totalOrderCostForDeliveryCalc = 0.0;
            foreach ($orders as $order) {
                $totalOrderCostForDeliveryCalc += $order->getOrderCost();
            }
            $deliveryCost = $this->calculateOrderDeliveryCostByProductPrice($totalOrderCostForDeliveryCalc);
            $subTotal     = $totalOrderCostForDeliveryCalc + $deliveryCost;

            return floor($subTotal * 100) / 100;
        }

        return null;
    }

    /**
     * Calculate order delivery cost by product id
     *
     * Desc: In production system, these rules should be stored in a database
     *
     * @param float $productPrice
     *
     * @return float
     */
    private function calculateOrderDeliveryCostByProductPrice(float $productPrice): float
    {
        $deliveryCost = 0.0;
        // Calculate Delivery Cost by rules
        if ($productPrice < 90 && $productPrice >= 50) {
            $deliveryCost = 2.95;
        } else if ($productPrice < 50) {
            $deliveryCost = 4.95;
        }

        return $deliveryCost;
    }

    /**
     * Calculate Product Price By Special Offer
     *
     * @param float $discountRate
     * @param float $productPrice
     *
     * @return float
     */
    private function calculateProductPriceBySpecialOffer(float $discountRate, float $productPrice): float
    {
        if ($productPrice >= 0.1 && $discountRate >= 0.1) {
            return ($productPrice * $discountRate);

        }

        throw new LogicException("Special Offer Calculation Failed!");
    }
}