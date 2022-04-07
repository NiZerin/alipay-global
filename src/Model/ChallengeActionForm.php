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

class ChallengeActionForm
{
    public $challengeType;
    public $challengeRenderValue;
    public $triggerSource;
    public $extendInfo;

    /**
     * @return mixed
     */
    public function getChallengeType()
    {
        return $this->challengeType;
    }

    /**
     * @param mixed $challengeType
     */
    public function setChallengeType($challengeType)
    {
        $this->challengeType = $challengeType;
    }

    /**
     * @return mixed
     */
    public function getChallengeRenderValue()
    {
        return $this->challengeRenderValue;
    }

    /**
     * @param mixed $challengeRenderValue
     */
    public function setChallengeRenderValue($challengeRenderValue)
    {
        $this->challengeRenderValue = $challengeRenderValue;
    }

    /**
     * @return mixed
     */
    public function getTriggerSource()
    {
        return $this->triggerSource;
    }

    /**
     * @param mixed $triggerSource
     */
    public function setTriggerSource($triggerSource)
    {
        $this->triggerSource = $triggerSource;
    }

    /**
     * @return mixed
     */
    public function getExtendInfo()
    {
        return $this->extendInfo;
    }

    /**
     * @param mixed $extendInfo
     */
    public function setExtendInfo($extendInfo)
    {
        $this->extendInfo = $extendInfo;
    }
}
