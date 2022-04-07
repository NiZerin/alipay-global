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

class RiskScoreResult
{
    public $riskScoreType;
    public $riskScore;
    public $riskScoreDetails;

    /**
     * @return mixed
     */
    public function getRiskScoreType()
    {
        return $this->riskScoreType;
    }

    /**
     * @param mixed $riskScoreType
     */
    public function setRiskScoreType($riskScoreType)
    {
        $this->riskScoreType = $riskScoreType;
    }

    /**
     * @return mixed
     */
    public function getRiskScore()
    {
        return $this->riskScore;
    }

    /**
     * @param mixed $riskScore
     */
    public function setRiskScore($riskScore)
    {
        $this->riskScore = $riskScore;
    }

    /**
     * @return mixed
     */
    public function getRiskScoreDetails()
    {
        return $this->riskScoreDetails;
    }

    /**
     * @param mixed $riskScoreDetails
     */
    public function setRiskScoreDetails($riskScoreDetails)
    {
        $this->riskScoreDetails = $riskScoreDetails;
    }
}
