<?php
namespace NiZerin\Request\Pay;

use NiZerin\Model\Amount;
use NiZerin\Model\InStorePaymentScenario;
use NiZerin\Model\PaymentFactor;
use NiZerin\Model\PaymentMethod;
use NiZerin\Model\ProductCodeType;

class EntryCodePaymentRequest extends AlipayPayRequest
{
    /**
     * @param $paymentRequestId
     * @param $order
     * @param $currency
     * @param $amountInCents
     * @param $paymentNotifyUrl
     * @param $paymentExpiryTime
     */
    public function __construct($paymentRequestId, $order, $currency, $amountInCents, $paymentNotifyUrl, $paymentExpiryTime)
    {
        $this->setPath('/ams/api/v1/payments/pay');
        $this->setProductCode(ProductCodeType::IN_STORE_PAYMENT);

        $paymentAmount = new Amount();
        $paymentAmount->setCurrency($currency);
        $paymentAmount->setValue($amountInCents);
        $this->setPaymentAmount($paymentAmount);

        $paymentMethod = new PaymentMethod();
        $paymentMethod->setPaymentMethodType('CONNECT_WALLET');
        $this->setPaymentMethod($paymentMethod);

        $paymentFactor = new PaymentFactor();
        $paymentFactor->setInStorePaymentScenario(InStorePaymentScenario::EntryCode);
        $this->setPaymentFactor($paymentFactor);

        $this->setPaymentRequestId($paymentRequestId);
        $this->setOrder($order);

        if (isset($paymentNotifyUrl)) {
            $this->setPaymentNotifyUrl($paymentNotifyUrl);
        }

        if (isset($paymentExpiryTime)) {
            $this->setPaymentExpiryTime($paymentExpiryTime);
        }
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function validate()
    {
        $this->assertTrue(isset($this->order), "order required.");
        $this->assertTrue(isset($this->order->merchant), "order.merchant required.");
        $this->assertTrue(isset($this->order->orderAmount), "order.orderAmount required.");
        $this->assertTrue(isset($this->order->orderDescription), "order.orderDescription required.");
        $this->assertTrue(isset($this->order->merchant->referenceMerchantId), "order.merchant.referenceMerchantId required.");
        $this->assertTrue(isset($this->order->merchant->merchantMCC), "order.merchant.merchantMcc required.");
        $this->assertTrue(isset($this->order->merchant->merchantName), "order.merchant.merchantName required.");
        $this->assertTrue(isset($this->order->merchant->store), "order.merchant.store required.");
        $this->assertTrue(isset($this->order->merchant->store->referenceStoreId), "order.merchant.store.referenceStoreId required.");
        $this->assertTrue(isset($this->order->merchant->store->storeName), "order.merchant.store.storeName required.");
        $this->assertTrue(isset($this->order->merchant->store->storeMCC), "order.merchant.store.storeMcc required.");
        $this->assertTrue(isset($this->order->env), "order.env required.");
        $this->assertTrue(isset($this->order->env->userAgent), "order.env.userAgent required.");

    }

    /**
     * @param $exp
     * @param $msg
     * @return void
     * @throws \Exception
     */
    public function assertTrue($exp, $msg)
    {
        if (!$exp) {
            throw new \Exception($msg);
        }
    }
}