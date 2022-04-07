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

class SettlementStrategy
{
    public $settlementCurrency;

    /**
     * @return mixed
     */
    public function getSettlementCurrency()
    {
        return $this->settlementCurrency;
    }

    /**
     * @param string $settlementCurrency
     * @return void
     */
    public function setSettlementCurrency(string $settlementCurrency)
    {
        $this->settlementCurrency = $settlementCurrency;
    }
}
