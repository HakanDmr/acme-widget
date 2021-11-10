<?php

namespace acme\test;

use acme\sale\helper\SessionHelper;
use acme\service\BasketService;

require_once("app/service/BasketService.php");

/**
 * New Sales System Tests
 *
 * Desc: For PoC purposes
 * @version   0.1
 * @copyright Acme Widget Co.
 */
class OrderTest
{
    private BasketService $basketService;

    /**
     * Basket Test for B01, B01, R01, R01, R01
     *
     * @return float
     */
    public function basketTest4(): float
    {
        // Create Basket Service
        $this->basketService = new BasketService();
        
        # Add products to basket
        //TODO: Using product-code to selection not good for performance. In production: we need to use primary key
        $product1Result = $this->basketService->add("B01");
        $product2Result = $this->basketService->add("B01");
        $product3Result = $this->basketService->add("R01");
        $product4Result = $this->basketService->add("R01");
        $product5Result = $this->basketService->add("R01");

        # Add product in basket tests
        assert($product1Result === true, "1 Product: Test Failed!");
        assert($product2Result === true, "2 Product: Test Failed!");
        assert($product3Result === true, "3 Product: Test Failed!");
        assert($product4Result === true, "4 Product: Test Failed!");
        assert($product5Result === true, "5 Product: Test Failed!");

        // Calculate Order for first and second product
        $basketCost = $this->basketService->calculateBasket();
        // Flush records for new calculation
        SessionHelper::deleteRecord("basket");

        return $basketCost;
    }

    /**
     * Basket tests for R01, G01
     *
     * @return float
     */
    public function basketTest3(): float
    {
        // Create Basket Service
        $this->basketService = new BasketService();
        
        # Add products to basket
        $product1Result = $this->basketService->add("R01");
        $product2Result = $this->basketService->add("G01");

        # Add product in basket tests
        assert($product1Result === true, "1 Product: Test Failed!");
        assert($product2Result === true, "2 Product: Test Failed!");

        // Calculate Order for first and second product
        $basketCost = $this->basketService->calculateBasket();
        // Flush records for new calculation
        SessionHelper::deleteRecord("basket");

        return $basketCost;
    }

    /**
     * Basket tests for R01, R01
     *
     * @return float
     */
    public function basketTest2(): float
    {
        // Create Basket Service
        $this->basketService = new BasketService();
        
        # Add products to basket
        $product1Result = $this->basketService->add("R01");
        $product2Result = $this->basketService->add("R01");

        # Add product in basket tests
        assert($product1Result === true, "1 Product: Test Failed!");
        assert($product2Result === true, "2 Product: Test Failed!");

        // Calculate Order for first and second product
        $basketCost = $this->basketService->calculateBasket();
        // Flush records for new calculation
        SessionHelper::deleteRecord("basket");

        return $basketCost;
    }

    /**
     * Basket tests for B01, G01
     *
     * @return float
     */
    public function basketTest1(): float
    {
        // Create Basket Service
        $this->basketService = new BasketService();
        
        # Add products to basket
        $product1Result = $this->basketService->add("B01");
        $product2Result = $this->basketService->add("G01");

        # Add product in basket tests
        assert($product1Result === true, "1 Product: Test Failed!");
        assert($product2Result === true, "2 Product: Test Failed!");

        // Calculate Order for first and second product
        $basketCost = $this->basketService->calculateBasket();
        // Flush records for new calculation
        SessionHelper::deleteRecord("basket");

        return $basketCost;
    }
}