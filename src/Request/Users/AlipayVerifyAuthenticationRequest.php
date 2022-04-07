<?php

/*
 * This file is part of the nizerin/alipay-global.
 *
 * (c) nizerin <i@nizer.in>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace NiZerin\Request\Users;

use NiZerin\Request\AlipayRequest;

class AlipayVerifyAuthenticationRequest extends AlipayRequest
{
    public $authenticationType;
    public $authenticationRequestId;
    public $authenticationValue;

    /**
     * @return mixed
     */
    public function getAuthenticationType()
    {
        return $this->authenticationType;
    }

    /**
     * @param mixed $authenticationType
     */
    public function setAuthenticationType($authenticationType)
    {
        $this->authenticationType = $authenticationType;
    }

    /**
     * @return mixed
     */
    public function getAuthenticationRequestId()
    {
        return $this->authenticationRequestId;
    }

    /**
     * @param mixed $authenticationRequestId
     */
    public function setAuthenticationRequestId($authenticationRequestId)
    {
        $this->authenticationRequestId = $authenticationRequestId;
    }

    /**
     * @return mixed
     */
    public function getAuthenticationValue()
    {
        return $this->authenticationValue;
    }

    /**
     * @param mixed $authenticationValue
     */
    public function setAuthenticationValue($authenticationValue)
    {
        $this->authenticationValue = $authenticationValue;
    }
}
