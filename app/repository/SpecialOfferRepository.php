<?php

namespace acme\repository;

use acme\model\SpecialOfferModel;

/**
 * Special Offer Repository
 *
 * Desc: We simply using array as fake database for special offers
 * Solution: For proper implementation of repository pattern we need database connection
 *           but we cannot use it due to PoC(proof of concept) constraints.
 * @version   0.1
 * @copyright Acme Widget Co.
 */
class SpecialOfferRepository
{
    private array $specialOffers = array();

    /**
     * Get special offers
     *
     * @return array
     */
    public function getSpecialOffers(): array
    {
        return $this->specialOffers;
    }

    /**
     * Add Special Offer
     *
     * @param SpecialOfferModel $specialOfferModel
     *
     * @return SpecialOfferModel
     */
    public function addSpecialOffer(SpecialOfferModel $specialOfferModel): SpecialOfferModel
    {
        if (!array_key_exists($specialOfferModel->getId(), $this->specialOffers)) {
            $this->specialOffers[$specialOfferModel->getId()] = $specialOfferModel;
        }

        return $this->specialOffers[$specialOfferModel->getId()];
    }

    //TODO: Other methods did not implemented because of PoC requirements (add, update, delete etc.)

}