<?php

/*
 * This file is part of the nizerin/alipay-global.
 *
 * (c) nizerin <i@nizer.in>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace NiZerin\Model;

class TransactionType
{
    public const PAYMENT       = 'PAYMENT';
    public const REFUND        = 'REFUND';
    public const CAPTURE       = 'CAPTURE';
    public const CANCEL        = 'CANCEL';
    public const AUTHORIZATION = 'AUTHORIZATION';
    public const VOID          = 'VOID';
}
