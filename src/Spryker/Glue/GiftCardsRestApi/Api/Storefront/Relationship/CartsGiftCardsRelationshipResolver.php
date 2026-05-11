<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

declare(strict_types=1);

namespace Spryker\Glue\GiftCardsRestApi\Api\Storefront\Relationship;

use Generated\Api\Storefront\GiftCardsStorefrontResource;
use Generated\Shared\Transfer\GiftCardTransfer;
use Spryker\ApiPlatform\Relationship\AbstractRelationshipResolver;

/**
 * Builds `GiftCards` sub-resources from `giftCards` carried on a `Carts`/`GuestCarts`
 * parent resource. Mirrors the legacy {@see \Spryker\Glue\GiftCardsRestApi\Processor\Expander\GiftCardByQuoteResourceRelationshipExpander}
 * behavior: data is read directly from the parent's QuoteTransfer-derived gift cards —
 * no extra cart fetch.
 */
class CartsGiftCardsRelationshipResolver extends AbstractRelationshipResolver
{
    /**
     * @return array<\Generated\Api\Storefront\GiftCardsStorefrontResource>
     */
    protected function resolveRelationship(): array
    {
        $resources = [];

        foreach ($this->getParentResources() as $parent) {
            $giftCards = $parent->giftCards ?? [];

            foreach ($giftCards as $giftCardTransfer) {
                if (!$giftCardTransfer instanceof GiftCardTransfer) {
                    continue;
                }

                $resources[] = $this->mapGiftCardToResource($giftCardTransfer);
            }
        }

        return $resources;
    }

    protected function mapGiftCardToResource(GiftCardTransfer $giftCardTransfer): GiftCardsStorefrontResource
    {
        $resource = new GiftCardsStorefrontResource();
        $resource->code = $giftCardTransfer->getCode();
        $resource->name = $giftCardTransfer->getName();
        $resource->value = $giftCardTransfer->getValue();
        $resource->currencyIsoCode = $giftCardTransfer->getCurrencyIsoCode();
        $resource->actualValue = $giftCardTransfer->getActualValue();
        $resource->isActive = $giftCardTransfer->getIsActive();

        return $resource;
    }
}
