<?php

namespace acme\model;

require_once("app/model/IProductModel.php");

/**
 * Product Model
 *
 * @version   0.1
 * @copyright Acme Widget Co.
 */
class ProductModel implements IProductModel
{
    private int    $id;
    private string $name;
    private string $code;
    private ?float $price;
    private string $currency = "USD";
    private bool   $status = true;

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
     * @return ProductModel
     * @todo For production this method must not exists! (Because of consistency)
     */
    public function setId(int $id): ProductModel
    {
        $this->id = $id;

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
     * @return ProductModel
     */
    public function setName(string $name): ProductModel
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return ProductModel
     */
    public function setCode(string $code): ProductModel
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     *
     * @return ProductModel
     */
    public function setPrice(?float $price): ProductModel
    {
        $this->price = $price;

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
     * @return ProductModel
     */
    public function setStatus(bool $status): ProductModel
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }
    
}