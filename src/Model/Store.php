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

class Store
{
    public $referenceStoreId;
    public $storeName;
    public $storeMCC;
    public $storeDisplayName;
    public $storeTerminalId;
    public $storeOperatorId;
    public $storeAddress;
    public $storePhoneNo;

    /**
     * @return string
     */
    public function getReferenceStoreId()
    {
        return $this->referenceStoreId;
    }

    /**
     * @param string $referenceStoreId
     */
    public function setReferenceStoreId($referenceStoreId)
    {
        $this->referenceStoreId = $referenceStoreId;
    }

    /**
     * @return string
     */
    public function getStoreName()
    {
        return $this->storeName;
    }

    /**
     * @param string $storeName
     */
    public function setStoreName($storeName)
    {
        $this->storeName = $storeName;
    }

    /**
     * @return string
     */
    public function getStoreMCC()
    {
        return $this->storeMCC;
    }

    /**
     * @param string $storeMCC
     */
    public function setStoreMCC($storeMCC)
    {
        $this->storeMCC = $storeMCC;
    }

    /**
     * @return string
     */
    public function getStoreDisplayName()
    {
        return $this->storeDisplayName;
    }

    /**
     * @param string $storeDisplayName
     */
    public function setStoreDisplayName($storeDisplayName)
    {
        $this->storeDisplayName = $storeDisplayName;
    }

    /**
     * @return string
     */
    public function getStoreTerminalId()
    {
        return $this->storeTerminalId;
    }

    /**
     * @param string $storeTerminalId
     */
    public function setStoreTerminalId($storeTerminalId)
    {
        $this->storeTerminalId = $storeTerminalId;
    }

    /**
     * @return string
     */
    public function getStoreOperatorId()
    {
        return $this->storeOperatorId;
    }

    /**
     * @param string $storeOperatorId
     */
    public function setStoreOperatorId($storeOperatorId)
    {
        $this->storeOperatorId = $storeOperatorId;
    }

    /**
     * @return Address
     */
    public function getStoreAddress()
    {
        return $this->storeAddress;
    }

    /**
     * @param Address $storeAddress
     */
    public function setStoreAddress($storeAddress)
    {
        $this->storeAddress = $storeAddress;
    }

    /**
     * @return string
     */
    public function getStorePhoneNo()
    {
        return $this->storePhoneNo;
    }

    /**
     * @param string $storePhoneNo
     */
    public function setStorePhoneNo($storePhoneNo)
    {
        $this->storePhoneNo = $storePhoneNo;
    }
}
