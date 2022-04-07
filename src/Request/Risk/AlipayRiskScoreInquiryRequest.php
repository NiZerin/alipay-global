<?php

/*
 * This file is part of the nizerin/alipay-global.
 *
 * (c) nizerin <i@nizer.in>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace NiZerin\Request\Risk;

use NiZerin\Request\AlipayRequest;

class AlipayRiskScoreInquiryRequest extends AlipayRequest
{
    public $customerBelongsTo;
    public $customerIdType;
    public $customerId;
    public $riskScoreTypes;

    /**
     * @return mixed
     */
    public function getCustomerBelongsTo()
    {
        return $this->customerBelongsTo;
    }

    /**
     * @param mixed $customerBelongsTo
     */
    public function setCustomerBelongsTo($customerBelongsTo)
    {
        $this->customerBelongsTo = $customerBelongsTo;
    }

    /**
     * @return mixed
     */
    public function getCustomerIdType()
    {
        return $this->customerIdType;
    }

    /**
     * @param mixed $customerIdType
     */
    public function setCustomerIdType($customerIdType)
    {
        $this->customerIdType = $customerIdType;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param mixed $customerId
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * @return mixed
     */
    public function getRiskScoreTypes()
    {
        return $this->riskScoreTypes;
    }

    /**
     * @param mixed $riskScoreTypes
     */
    public function setRiskScoreTypes($riskScoreTypes)
    {
        $this->riskScoreTypes = $riskScoreTypes;
    }
}
