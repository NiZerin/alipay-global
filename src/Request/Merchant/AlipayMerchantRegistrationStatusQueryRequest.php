<?php

/*
 * This file is part of the nizerin/alipay-global.
 *
 * (c) nizerin <i@nizer.in>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace NiZerin\Request\Merchant;

use NiZerin\Request\AlipayRequest;

class AlipayMerchantRegistrationStatusQueryRequest extends AlipayRequest
{
    public $registrationRequestId;
    public $referenceMerchantId;

    /**
     * @return mixed
     */
    public function getRegistrationRequestId()
    {
        return $this->registrationRequestId;
    }

    /**
     * @param mixed $registrationRequestId
     */
    public function setRegistrationRequestId($registrationRequestId)
    {
        $this->registrationRequestId = $registrationRequestId;
    }

    /**
     * @return mixed
     */
    public function getReferenceMerchantId()
    {
        return $this->referenceMerchantId;
    }

    /**
     * @param mixed $referenceMerchantId
     */
    public function setReferenceMerchantId($referenceMerchantId)
    {
        $this->referenceMerchantId = $referenceMerchantId;
    }
}
