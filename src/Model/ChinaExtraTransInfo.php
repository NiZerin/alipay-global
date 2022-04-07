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

class ChinaExtraTransInfo
{
    public $businessType;
    public $flightNumber;
    public $departureTime;
    public $hotelName;
    public $checkinTime;
    public $checkoutTime;
    public $admissionNoticeUrl;
    public $totalQuantity;
    public $goodsInfo;
    public $otherBusinessType;

    public function getBusinessType()
    {
        return $this->businessType;
    }

    public function setBusinessType(string $businessType)
    {
        $this->businessType = $businessType;
    }

    public function getFlightNumber()
    {
        return $this->flightNumber;
    }

    public function setFlightNumber(string $flightNumber)
    {
        $this->flightNumber = $flightNumber;
    }

    public function getDepartureTime()
    {
        return $this->departureTime;
    }

    public function setDepartureTime(string $departureTime)
    {
        $this->departureTime = $departureTime;
    }

    public function getHotelName()
    {
        return $this->hotelName;
    }

    public function setHotelName(string $hotelName)
    {
        $this->hotelName = $hotelName;
    }

    public function getCheckinTime()
    {
        return $this->checkinTime;
    }

    public function setCheckinTime(string $checkinTime)
    {
        $this->checkinTime = $checkinTime;
    }

    public function getCheckoutTime()
    {
        return $this->checkoutTime;
    }

    public function setCheckoutTime(string $checkoutTime)
    {
        $this->checkoutTime = $checkoutTime;
    }

    public function getAdmissionNoticeUrl()
    {
        return $this->admissionNoticeUrl;
    }

    public function setAdmissionNoticeUrl(string $admissionNoticeUrl)
    {
        $this->admissionNoticeUrl = $admissionNoticeUrl;
    }

    public function getTotalQuantity()
    {
        return $this->totalQuantity;
    }

    public function setTotalQuantity(string $totalQuantity)
    {
        $this->totalQuantity = $totalQuantity;
    }

    public function getGoodsInfo()
    {
        return $this->goodsInfo;
    }

    public function setGoodsInfo(string $goodsInfo)
    {
        $this->goodsInfo = $goodsInfo;
    }

    public function getOtherBusinessType()
    {
        return $this->otherBusinessType;
    }

    public function setOtherBusinessType(string $otherBusinessType)
    {
        $this->otherBusinessType = $otherBusinessType;
    }
}
