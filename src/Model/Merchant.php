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

class Merchant
{
    public $referenceMerchantId;
    public $merchantMCC;
    public $merchantName;
    public $merchantDisplayName;
    public $merchantAddress;
    public $merchantRegisterDate;
    public $store;
    public $merchantType;

    /**
     * @return string
     */
    public function getReferenceMerchantId()
    {
        return $this->referenceMerchantId;
    }

    /**
     * @param string $referenceMerchantId
     */
    public function setReferenceMerchantId($referenceMerchantId)
    {
        $this->referenceMerchantId = $referenceMerchantId;
    }

    /**
     * @return string
     */
    public function getMerchantMCC()
    {
        return $this->merchantMCC;
    }

    /**
     * @param string $merchantMCC
     */
    public function setMerchantMCC($merchantMCC)
    {
        $this->merchantMCC = $merchantMCC;
    }

    /**
     * @return string
     */
    public function getMerchantName()
    {
        return $this->merchantName;
    }

    /**
     * @param string $merchantName
     */
    public function setMerchantName($merchantName)
    {
        $this->merchantName = $merchantName;
    }

    /**
     * @return string
     */
    public function getMerchantDisplayName()
    {
        return $this->merchantDisplayName;
    }

    /**
     * @param string $merchantDisplayName
     */
    public function setMerchantDisplayName($merchantDisplayName)
    {
        $this->merchantDisplayName = $merchantDisplayName;
    }

    /**
     * @return Address
     */
    public function getMerchantAddress()
    {
        return $this->merchantAddress;
    }

    /**
     * @param Address $merchantAddress
     */
    public function setMerchantAddress($merchantAddress)
    {
        $this->merchantAddress = $merchantAddress;
    }

    /**
     * @return string
     */
    public function getMerchantRegisterDate()
    {
        return $this->merchantRegisterDate;
    }

    /**
     * @param string $merchantRegisterDate
     */
    public function setMerchantRegisterDate($merchantRegisterDate)
    {
        $this->merchantRegisterDate = $merchantRegisterDate;
    }

    /**
     * @return Store
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * @param Store $store
     */
    public function setStore($store)
    {
        $this->store = $store;
    }

    /**
     * @return mixed
     */
    public function getMerchantType()
    {
        return $this->merchantType;
    }

    /**
     * @param mixed $merchantType
     */
    public function setMerchantType($merchantType)
    {
        $this->merchantType = $merchantType;
    }
}
