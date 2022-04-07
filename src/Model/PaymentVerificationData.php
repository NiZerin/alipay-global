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

class PaymentVerificationData
{
    public $verifyRequestId;
    public $authenticationCode;

    /**
     * @return mixed
     */
    public function getVerifyRequestId()
    {
        return $this->verifyRequestId;
    }

    /**
     * @param mixed $verifyRequestId
     */
    public function setVerifyRequestId($verifyRequestId)
    {
        $this->verifyRequestId = $verifyRequestId;
    }

    /**
     * @return mixed
     */
    public function getAuthenticationCode()
    {
        return $this->authenticationCode;
    }

    /**
     * @param mixed $authenticationCode
     */
    public function setAuthenticationCode($authenticationCode)
    {
        $this->authenticationCode = $authenticationCode;
    }
}
