<?php

namespace acme\sale\helper;

use acme\model\ProductModel;
use acme\model\SpecialOfferModel;

require_once("app/model/ProductModel.php");
require_once("app/model/SpecialOfferModel.php");

/**
 * Data Loader Helper
 *
 * Desc: Generally, all of this data must be stored and accessed in a database.
 * @version   0.1
 * @copyright Acme Widget Co.
 */
class DataLoaderHelper
{
    private ?ProductModel      $redWidget;
    private ?ProductModel      $greenWidget;
    private ?ProductModel      $blueWidget;
    private ?SpecialOfferModel $specialOfferModel;
    private array              $specialOffers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->redWidget   = new ProductModel();
        $this->greenWidget = new ProductModel();
        $this->blueWidget  = new ProductModel();

        $this->specialOfferModel = new SpecialOfferModel();
        $this->specialOffers     = array();

    }

    /**
     * Load Data
     */
    private function loadProductData(): void
    {
        # Red Widget
        $this->redWidget->setId(1)
                        ->setName("Red Widget")
                        ->setCode("R01")
                        ->setPrice(32.95);

        # Green Widget
        $this->greenWidget->setId(2)
                          ->setName("Green Widget")
                          ->setCode("G01")
                          ->setPrice(24.95);

        # Blue Widget
        $this->blueWidget->setId(3)
                         ->setName("Blue Widget")
                         ->setCode("B01")
                         ->setPrice(7.95);
    }

    /**
     * Load Special Offers
     */
    private function loadSpecialOffers(): void
    {
        # Create first special offer
        $this->specialOfferModel->setId(1)
                                ->setProductId(1)
                                ->setName("Buy One Red Widget, Get Second HALF PRICE!")
                                ->setProductCountForDiscount(2)
                                ->setDiscountRate(0.50);

        # Add first offer into special offers list
        $this->specialOffers[$this->specialOfferModel->getId()] = $this->specialOfferModel;
    }

    /**
     * Get product list
     *
     * @return array
     */
    public function getProductList(): array
    {
        $this->loadProductData();

        return [$this->redWidget, $this->greenWidget, $this->blueWidget];
    }

    /**
     * Get special offers
     *
     * @return array
     */
    public function getSpecialOffers(): array
    {
        $this->loadSpecialOffers();

        return $this->specialOffers;
    }

}