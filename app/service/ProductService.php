<?php

namespace acme\service;

use acme\model\ProductModel;
use acme\repository\ProductRepository;
use acme\sale\helper\DataLoaderHelper;

require_once("app/helper/DataLoaderHelper.php");
require_once("app/repository/ProductRepository.php");

/**
 * Product Service
 *
 * @version   0.1
 * @copyright Acme Widget Co.
 */
class ProductService
{
    private ProductRepository $productRepository;

    /**
     * Constructor
     *
     * Desc: We load demo data and initialize Product Repository
     */
    public function __construct()
    {
        // Load Demo Data
        $dataLoader  = new DataLoaderHelper();
        $productList = $dataLoader->getProductList();

        // Add all products to repository
        $this->productRepository = new ProductRepository();
        foreach ($productList as $product) {
            $this->productRepository->addProduct($product);
        }
    }

    /**
     * Get product by id
     *
     * @param int $productId
     *
     * @return ProductModel|null
     */
    public function getProductById(int $productId): ?ProductModel
    {
        if (count($this->productRepository->getProducts()) >= 1 && array_key_exists($productId, $this->productRepository->getProducts())) {
            return $this->productRepository->getProductById($productId);
        }

        return null;
    }

    /**
     * Get product by code
     *
     * @param string $productCode
     *
     * @return ProductModel|null
     */
    public function getProductByCode(string $productCode): ?ProductModel
    {
        if (count($this->productRepository->getProducts()) >= 1) {
            foreach ($this->productRepository->getProducts() as $product) {
                if ($product->getCode() === $productCode) {
                    return $product;
                }
            }
        }

        return null;
    }
}