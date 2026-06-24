<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\GiftCardsRestApi;

use Spryker\Glue\Kernel\AbstractBundleConfig;

class GiftCardsRestApiConfig extends AbstractBundleConfig
{
    /**
     * @api
     *
     * @uses \Spryker\Glue\CartsRestApi\CartsRestApiConfig::RESOURCE_CARTS
     *
     * @var string
     */
    public const RESOURCE_CARTS = 'carts';

    /**
     * @api
     *
     * @var string
     */
    public const RESOURCE_GIFT_CARDS = 'gift-cards';

    /**
     * @api
     *
     * @uses \Spryker\Glue\CartCodesRestApi\CartCodesRestApiConfig::RESOURCE_CART_CODES,
     *
     * @var string
     */
    public const RESOURCE_CART_CODES = 'cart-codes';
}
