<?php

/*
 * This file is part of the nizerin/alipay-global.
 *
 * (c) nizerin <i@nizer.in>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace NiZerin\Request\Order;

use NiZerin\Request\AlipayRequest;

class AlipayCreateOrderRequest extends AlipayRequest
{
    public $productCode;
    public $paymentRequestId;
    public $order;
    public $paymentAmount;
    public $paymentRedirectUrl;
    public $paymentNotifyUrl;

    /**
     * @return mixed
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * @param mixed $productCode
     */
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;
    }

    /**
     * @return mixed
     */
    public function getPaymentRequestId()
    {
        return $this->paymentRequestId;
    }

    /**
     * @param mixed $paymentRequestId
     */
    public function setPaymentRequestId($paymentRequestId)
    {
        $this->paymentRequestId = $paymentRequestId;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @return mixed
     */
    public function getPaymentAmount()
    {
        return $this->paymentAmount;
    }

    /**
     * @param mixed $paymentAmount
     */
    public function setPaymentAmount($paymentAmount)
    {
        $this->paymentAmount = $paymentAmount;
    }

    /**
     * @return mixed
     */
    public function getPaymentRedirectUrl()
    {
        return $this->paymentRedirectUrl;
    }

    /**
     * @param mixed $paymentRedirectUrl
     */
    public function setPaymentRedirectUrl($paymentRedirectUrl)
    {
        $this->paymentRedirectUrl = $paymentRedirectUrl;
    }

    /**
     * @return mixed
     */
    public function getPaymentNotifyUrl()
    {
        return $this->paymentNotifyUrl;
    }

    /**
     * @param mixed $paymentNotifyUrl
     */
    public function setPaymentNotifyUrl($paymentNotifyUrl)
    {
        $this->paymentNotifyUrl = $paymentNotifyUrl;
    }
}
