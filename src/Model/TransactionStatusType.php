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

class TransactionStatusType
{
    public const SUCCESS    = 'SUCCESS';
    public const FAIL       = 'FAIL';
    public const PROCESSING = 'FAIL';
    public const CANCELLED  = 'CANCELLED';
}
