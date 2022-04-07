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

class Env
{
    public $terminalType;
    public $osType;
    public $userAgent;
    public $deviceTokenId;
    public $clientIp;
    public $cookieId;
    public $storeTerminalId;
    public $storeTerminalRequestTime;
    public $extendInfo;

    /**
     * @return string
     */
    public function getTerminalType()
    {
        return $this->terminalType;
    }

    /**
     * @param string $terminalType
     */
    public function setTerminalType($terminalType)
    {
        $this->terminalType = $terminalType;
    }

    /**
     * @return OsType
     */
    public function getOsType()
    {
        return $this->osType;
    }

    /**
     * @param OsType $osType
     */
    public function setOsType($osType)
    {
        $this->osType = $osType;
    }

    /**
     * @return string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * @param string $userAgent
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    }

    /**
     * @return string
     */
    public function getDeviceTokenId()
    {
        return $this->deviceTokenId;
    }

    /**
     * @param string $deviceTokenId
     */
    public function setDeviceTokenId($deviceTokenId)
    {
        $this->deviceTokenId = $deviceTokenId;
    }

    /**
     * @return string
     */
    public function getClientIp()
    {
        return $this->clientIp;
    }

    /**
     * @param string $clientIp
     */
    public function setClientIp($clientIp)
    {
        $this->clientIp = $clientIp;
    }

    /**
     * @return string
     */
    public function getCookieId()
    {
        return $this->cookieId;
    }

    /**
     * @param string $cookieId
     */
    public function setCookieId($cookieId)
    {
        $this->cookieId = $cookieId;
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
    public function getStoreTerminalRequestTime()
    {
        return $this->storeTerminalRequestTime;
    }

    /**
     * @param string $storeTerminalRequestTime
     */
    public function setStoreTerminalRequestTime($storeTerminalRequestTime)
    {
        $this->storeTerminalRequestTime = $storeTerminalRequestTime;
    }

    /**
     * @return string
     */
    public function getExtendInfo()
    {
        return $this->extendInfo;
    }

    /**
     * @param string $extendInfo
     */
    public function setExtendInfo($extendInfo)
    {
        $this->extendInfo = $extendInfo;
    }
}
