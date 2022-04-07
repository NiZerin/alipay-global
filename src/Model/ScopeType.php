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

class ScopeType
{
    public const BASE_USER_INFO = 'BASE_USER_INFO';
    public const AGREEMENT_PAY  = 'AGREEMENT_PAY';
    public const USER_INFO      = 'USER_INFO';
    public const USER_LOGIN_ID  = 'USER_LOGIN_ID';
    public const HASH_LOGIN_ID  = 'HASH_LOGIN_ID';
    public const SEND_OTP       = 'SEND_OTP';
}
