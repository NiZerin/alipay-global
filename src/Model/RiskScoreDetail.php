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

class RiskScoreDetail
{
    public $riskInfoCode;
    public $riskInfoCodeResult;

    /**
     * @return mixed
     */
    public function getRiskInfoCode()
    {
        return $this->riskInfoCode;
    }

    /**
     * @param mixed $riskInfoCode
     */
    public function setRiskInfoCode($riskInfoCode)
    {
        $this->riskInfoCode = $riskInfoCode;
    }

    /**
     * @return mixed
     */
    public function getRiskInfoCodeResult()
    {
        return $this->riskInfoCodeResult;
    }

    /**
     * @param mixed $riskInfoCodeResult
     */
    public function setRiskInfoCodeResult($riskInfoCodeResult)
    {
        $this->riskInfoCodeResult = $riskInfoCodeResult;
    }
}
