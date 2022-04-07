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

class Shipping
{
    public $shippingName;
    public $shippingAddress;
    public $shippingCarrier;
    public $shippingPhoneNo;

    /**
     * @return string
     */
    public function getShippingName()
    {
        return $this->shippingName;
    }

    /**
     * @param string $shippingName
     */
    public function setShippingName($shippingName)
    {
        $this->shippingName = $shippingName;
    }

    /**
     * @return Address
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @param Address $shippingAddress
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * @return string
     */
    public function getShippingCarrier()
    {
        return $this->shippingCarrier;
    }

    /**
     * @param string $shippingCarrier
     */
    public function setShippingCarrier($shippingCarrier)
    {
        $this->shippingCarrier = $shippingCarrier;
    }

    /**
     * @return string
     */
    public function getShippingPhoneNo()
    {
        return $this->shippingPhoneNo;
    }

    /**
     * @param string $shippingPhoneNo
     */
    public function setShippingPhoneNo($shippingPhoneNo)
    {
        $this->shippingPhoneNo = $shippingPhoneNo;
    }
}
