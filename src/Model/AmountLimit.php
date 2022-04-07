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

class AmountLimit
{
    public $maxAmount;
    public $minAmount;
    public $remainAmount;

    /**
     * @return mixed
     */
    public function getMaxAmount()
    {
        return $this->maxAmount;
    }

    /**
     * @param mixed $maxAmount
     */
    public function setMaxAmount($maxAmount)
    {
        $this->maxAmount = $maxAmount;
    }

    /**
     * @return mixed
     */
    public function getMinAmount()
    {
        return $this->minAmount;
    }

    /**
     * @param mixed $minAmount
     */
    public function setMinAmount($minAmount)
    {
        $this->minAmount = $minAmount;
    }

    /**
     * @return mixed
     */
    public function getRemainAmount()
    {
        return $this->remainAmount;
    }

    /**
     * @param mixed $remainAmount
     */
    public function setRemainAmount($remainAmount)
    {
        $this->remainAmount = $remainAmount;
    }
}
