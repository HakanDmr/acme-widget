<?php

namespace acme\repository;

use acme\model\ProductModel;

require_once("app/model/ProductModel.php");

/**
 * Product Repository
 *
 * Desc: We simply using array as fake database for product
 * Solution: For proper implementation of repository pattern we need database connection
 *           but we cannot use it due to PoC(proof of concept) constraints.
 * @version   0.1
 * @copyright Acme Widget Co.
 */
class ProductRepository
{
    private array $products = array();

    /**
     * Add new product
     *
     * @param ProductModel $product
     *
     * @return void
     */
    public function addProduct(ProductModel $product): ProductModel
    {
        if (!array_key_exists($product->getId(), $this->products)) {
            $this->products[$product->getId()] = $product;
        }

        return $this->products[$product->getId()];
    }

    /**
     * Get Products
     *
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
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
        return $this->products[$productId];
    }

    /**
     * Remove Product
     *
     * @return void
     */
    public function removeProduct(): void
    {
        //TODO: We did not implement this method due to PoC requirements
    }

    /**
     * Update Product
     *
     * @return void
     */
    public function updateProduct(): void
    {
        //TODO: We did not implement this method due to PoC requirements
    }

}