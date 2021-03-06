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

class PspCustomerInfo
{
    public $pspName;
    public $pspCustomerId;
    public $displayCustomerId;

    /**
     * @return mixed
     */
    public function getPspName()
    {
        return $this->pspName;
    }

    /**
     * @param mixed $pspName
     */
    public function setPspName($pspName)
    {
        $this->pspName = $pspName;
    }

    /**
     * @return mixed
     */
    public function getPspCustomerId()
    {
        return $this->pspCustomerId;
    }

    /**
     * @param mixed $pspCustomerId
     */
    public function setPspCustomerId($pspCustomerId)
    {
        $this->pspCustomerId = $pspCustomerId;
    }

    /**
     * @return mixed
     */
    public function getDisplayCustomerId()
    {
        return $this->displayCustomerId;
    }

    /**
     * @param mixed $displayCustomerId
     */
    public function setDisplayCustomerId($displayCustomerId)
    {
        $this->displayCustomerId = $displayCustomerId;
    }
}
