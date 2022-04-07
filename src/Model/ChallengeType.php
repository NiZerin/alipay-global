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

class ChallengeType
{
    public const SMS_OTP           = 'SMS_OTP';
    public const PLAINTEXT_CARD_NO = 'PLAINTEXT_CARD_NO';
    public const CARD_EXPIRE_DATE  = 'CARD_EXPIRE_DATE';
}
