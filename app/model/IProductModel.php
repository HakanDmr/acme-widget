<?php

namespace acme\model;

/**
 * Product Model Interface
 *
 * @version   0.1
 * @copyright Acme Widget Co.
 */
interface IProductModel
{
    public function getId(): int;

    public function getName(): string;

    public function getCode(): string;

    public function getPrice(): ?float;
}