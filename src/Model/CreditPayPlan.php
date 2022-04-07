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

class CreditPayPlan
{
    public $installmentNum;
    public $creditPayFeeType;
    public $feePercentage;

    /**
     * @return mixed
     */
    public function getInstallmentNum()
    {
        return $this->installmentNum;
    }

    /**
     * @param mixed $installmentNum
     */
    public function setInstallmentNum($installmentNum)
    {
        $this->installmentNum = $installmentNum;
    }

    /**
     * @return mixed
     */
    public function getCreditPayFeeType()
    {
        return $this->creditPayFeeType;
    }

    /**
     * @param mixed $creditPayFeeType
     */
    public function setCreditPayFeeType($creditPayFeeType)
    {
        $this->creditPayFeeType = $creditPayFeeType;
    }

    /**
     * @return mixed
     */
    public function getFeePercentage()
    {
        return $this->feePercentage;
    }

    /**
     * @param mixed $feePercentage
     */
    public function setFeePercentage($feePercentage)
    {
        $this->feePercentage = $feePercentage;
    }
}
