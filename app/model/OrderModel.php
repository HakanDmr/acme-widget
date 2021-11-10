<?php

namespace acme\model;

/**
 * Order Model
 *
 * @version   0.1
 * @copyright Acme Widget Co.
 */
class OrderModel
{
    private int   $id;
    private int   $productId;
    private float $productPrice;
    private int   $specialOfferId;
    private float $totalDiscountAmount = 0.0;
    private float $deliveryCost;
    private float $orderCost;
    private float $totalCost;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return OrderModel
     */
    public function setId(int $id): OrderModel
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return float
     */
    public function getProductPrice(): float
    {
        return $this->productPrice;
    }

    /**
     * @param float $productPrice
     *
     * @return OrderModel
     */
    public function setProductPrice(float $productPrice): OrderModel
    {
        $this->productPrice = $productPrice;

        return $this;
    }
    
    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     *
     * @return OrderModel
     */
    public function setProductId(int $productId): OrderModel
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * @return int
     */
    public function getSpecialOfferId(): int
    {
        return $this->specialOfferId;
    }

    /**
     * @param int $specialOfferId
     *
     * @return OrderModel
     */
    public function setSpecialOfferId(int $specialOfferId): OrderModel
    {
        $this->specialOfferId = $specialOfferId;

        return $this;
    }

    /**
     * @return float
     */
    public function getDeliveryCost(): float
    {
        return $this->deliveryCost;
    }

    /**
     * @param float $deliveryCost
     *
     * @return OrderModel
     */
    public function setDeliveryCost(float $deliveryCost): OrderModel
    {
        $this->deliveryCost = $deliveryCost;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotalCost(): float
    {
        return $this->totalCost;
    }

    /**
     * @param float $totalCost
     *
     * @return OrderModel
     */
    public function setTotalCost(float $totalCost): OrderModel
    {
        $this->totalCost = $totalCost;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotalDiscountAmount(): float
    {
        return $this->totalDiscountAmount;
    }

    /**
     * @param float $totalDiscountAmount
     *
     * @return OrderModel
     */
    public function setTotalDiscountAmount(float $totalDiscountAmount): OrderModel
    {
        $this->totalDiscountAmount = $totalDiscountAmount;

        return $this;
    }

    /**
     * @return float
     */
    public function getOrderCost(): float
    {
        return $this->orderCost;
    }

    /**
     * @param float $orderCost
     *
     * @return OrderModel
     */
    public function setOrderCost(float $orderCost): OrderModel
    {
        $this->orderCost = $orderCost;

        return $this;
    }
}