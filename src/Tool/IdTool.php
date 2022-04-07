<?php

/*
 * This file is part of the nizerin/alipay-global.
 *
 * (c) nizerin <i@nizer.in>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace NiZerin\Tool;

class IdTool
{
    /**
     * @return string
     */
    public static function CreateId()
    {
        list($ms) = explode(' ', microtime());

        return date('YmdHis') . ($ms * 1000000) . rand(00, 99);
    }

    /**
     * @return string
     */
    public static function CreateReferenceOrderId()
    {
        return 'ORDER-' . self::CreateId();
    }

    /**
     * @return string
     */
    public static function CreatePaymentRequestId()
    {
        return 'PAYMENT-' . self::CreateId();
    }

    /**
     * @return string
     */
    public static function CreatePaymentMethodId()
    {
        return 'PAYMENTMETHOD-' . self::CreateId();
    }

    /**
     * @return string
     */
    public static function CreateBuyerId()
    {
        return 'BUYER-' . self::CreateId();
    }

    /**
     * @return string
     */
    public static function CreateReferenceGoodsId()
    {
        return 'GOODS-' . self::CreateId();
    }

    /**
     * @return string
     */
    public static function CreateReferenceMerchantId()
    {
        return 'MERCHANT-' . self::CreateId();
    }

    /**
     * @return string
     */
    public static function CreateAuthState()
    {
        return 'STATE-' . self::CreateId();
    }
}
