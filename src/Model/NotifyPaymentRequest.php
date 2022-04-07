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

class NotifyPaymentRequest
{
    public $httpMethod;
    public $clientId;
    public $rsqTime;
    public $rsqBody;
    public $signature;

    /**
     * @return mixed
     */
    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    /**
     * @param $httpMethod
     * @return void
     */
    public function setHttpMethod($httpMethod)
    {
        $this->httpMethod = $httpMethod;
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param $clientId
     * @return void
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @return mixed
     */
    public function getRsqTime()
    {
        return $this->rsqTime;
    }

    /**
     * @param $rsqTime
     * @return void
     */
    public function setRsqTime($rsqTime)
    {
        $this->rsqTime = $rsqTime;
    }

    /**
     * @return mixed
     */
    public function getRsqBody()
    {
        return $this->rsqBody;
    }

    /**
     * @param $rsqBody
     * @return void
     */
    public function setRsqBody($rsqBody)
    {
        $this->rsqBody = $rsqBody;
    }

    /**
     * @return mixed
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param $signature
     * @return void
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }
}
