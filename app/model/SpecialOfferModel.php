<?php

namespace acme\model;

/**
 * Special Offer Model
 *
 * @version   0.1
 * @copyright Acme Widget Co.
 */
class SpecialOfferModel
{
    private int    $id;
    private int    $productId;
    private string $name;
    private int    $productCountForDiscount = 0;
    private float  $discountRate            = 0.0;
    private bool   $status                  = true;

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
     * @return SpecialOfferModel
     */
    public function setId(int $id): SpecialOfferModel
    {
        $this->id = $id;

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
     * @return SpecialOfferModel
     */
    public function setProductId(int $productId): SpecialOfferModel
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return SpecialOfferModel
     */
    public function setName(string $name): SpecialOfferModel
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return float
     */
    public function getDiscountRate(): float
    {
        return $this->discountRate;
    }

    /**
     * @param float $discountRate
     *
     * @return SpecialOfferModel
     */
    public function setDiscountRate(float $discountRate): SpecialOfferModel
    {
        $this->discountRate = $discountRate;

        return $this;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     *
     * @return SpecialOfferModel
     */
    public function setStatus(bool $status): SpecialOfferModel
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return int
     */
    public function getProductCountForDiscount(): int
    {
        return $this->productCountForDiscount;
    }

    /**
     * @param int $productCountForDiscount
     *
     * @return SpecialOfferModel
     */
    public function setProductCountForDiscount(int $productCountForDiscount): SpecialOfferModel
    {
        $this->productCountForDiscount = $productCountForDiscount;

        return $this;
    }
    
}