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

class Buyer
{
    public $referenceBuyerId;
    public $buyerName;
    public $buyerPhoneNo;
    public $buyerEmail;

    /**
     * @return string
     */
    public function getReferenceBuyerId()
    {
        return $this->referenceBuyerId;
    }

    /**
     * @param string $referenceBuyerId
     */
    public function setReferenceBuyerId($referenceBuyerId)
    {
        $this->referenceBuyerId = $referenceBuyerId;
    }

    /**
     * @return UserName
     */
    public function getBuyerName()
    {
        return $this->buyerName;
    }

    /**
     * @param UserName $buyerName
     */
    public function setBuyerName($buyerName)
    {
        $this->buyerName = $buyerName;
    }

    /**
     * @return string
     */
    public function getBuyerPhoneNo()
    {
        return $this->buyerPhoneNo;
    }

    /**
     * @param string $buyerPhoneNo
     */
    public function setBuyerPhoneNo($buyerPhoneNo)
    {
        $this->buyerPhoneNo = $buyerPhoneNo;
    }

    /**
     * @return string
     */
    public function getBuyerEmail()
    {
        return $this->buyerEmail;
    }

    /**
     * @param string $buyerEmail
     */
    public function setBuyerEmail($buyerEmail)
    {
        $this->buyerEmail = $buyerEmail;
    }
}
