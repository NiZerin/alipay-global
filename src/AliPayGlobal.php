<?php

/*
 * This file is part of the nizerin/alipay-global.
 *
 * (c) nizerin <i@nizer.in>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace NiZerin;

use Exception;
use NiZerin\Client\AcAlipayClient;
use NiZerin\Model\Amount;
use NiZerin\Model\Buyer;
use NiZerin\Model\ChinaExtraTransInfo;
use NiZerin\Model\Endpoint;
use NiZerin\Model\Env;
use NiZerin\Model\ExtendInfo;
use NiZerin\Model\Goods;
use NiZerin\Model\Merchant;
use NiZerin\Model\Order;
use NiZerin\Model\PaymentMethod;
use NiZerin\Model\ProductCodeType;
use NiZerin\Model\SettlementStrategy;
use NiZerin\Request\Auth\AlipayAuthApplyTokenRequest;
use NiZerin\Request\Auth\AlipayAuthConsultRequest;
use NiZerin\Request\Motify\AlipayAcNotify;
use NiZerin\Request\Pay\AlipayPayRequest;
use NiZerin\Tool\IdTool;
use NiZerin\Tool\SignatureTool;

class AliPayGlobal
{
    public const PATH_PREFIX = '/ams/{sandbox}api/v1/';

    private $alipayClient;
    private $client_id;
    private $is_sandbox;
    private $alipayPublicKey;
    private $merchantPrivateKey;

    /**
     * @param $params
     */
    public function __construct($params)
    {
        $params = array_merge([
            'client_id'          => '',
            'endpoint_area'      => 'ASIA',
            'merchantPrivateKey' => '',
            'alipayPublicKey'    => '',
            'is_sandbox'         => false,
        ], $params);
        $this->alipayPublicKey    = $params['alipayPublicKey'];
        $this->merchantPrivateKey = $params['merchantPrivateKey'];
        $this->client_id          = $params['client_id'];
        $this->is_sandbox         = $params['is_sandbox'];
        $this->alipayClient       = new AcAlipayClient(
            constant(Endpoint::class . '::' . $params['endpoint_area']),
            $this->merchantPrivateKey,
            $this->alipayPublicKey
        );
    }

    /**
     * @param $key
     * @return array|string|string[]
     */
    public function getPath($key)
    {
        return str_replace('{sandbox}', $this->is_sandbox ? 'sandbox/' : '', self::PATH_PREFIX . $key);
    }

    /**
     * @param $params
     * @return mixed
     * @throws Exception
     */
    public function payCashier($params)
    {
        $params = array_merge([
            'notify_url' => null,
            'return_url' => null,
            'amount'     => [
                'currency' => null,
                'value'    => null,
            ],
            'order' => [
                'id'          => null,
                'desc'        => null,
                'extend_info' => [
                    'china_extra_trans_info' => [
                        'business_type' => null,
                    ],
                ],
            ],
            'payment_request_id'  => null,
            'settlement_strategy' => [
                'currency' => null,
            ],
            'terminal_type' => null,
            'os_type'       => null,
            'os_version'    => null,
        ], $params);

        $alipayPayRequest = new AlipayPayRequest();
        $alipayPayRequest->setPath($this->getPath('payments/pay'));
        $alipayPayRequest->setClientId($this->client_id);

        $alipayPayRequest->setProductCode(ProductCodeType::CASHIER_PAYMENT);
        $alipayPayRequest->setPaymentNotifyUrl($params['notify_url']);
        $alipayPayRequest->setPaymentRedirectUrl($params['return_url']);
        $alipayPayRequest->setPaymentRequestId($params['payment_request_id'] ?? IdTool::CreatePaymentRequestId());

        $paymentMethod = new PaymentMethod();
        $paymentMethod->setPaymentMethodType($params['customer_belongs_to']);
        $alipayPayRequest->setPaymentMethod($paymentMethod);

        $amount = new Amount();
        $amount->setCurrency($params['amount']['currency']);
        $amount->setValue($params['amount']['value']);

        $order = new Order();
        $order->setOrderDescription($params['order']['desc']);
        $order->setReferenceOrderId($params['order']['id'] ?? IdTool::CreateReferenceOrderId());
        $order->setOrderAmount($amount);

        $chinaExtraTransInfo = new ChinaExtraTransInfo();
        $chinaExtraTransInfo->setBusinessType($params['order']['extend_info']['china_extra_trans_info']['business_type']);

        $extendInfo = new ExtendInfo();
        $extendInfo->setChinaExtraTransInfo($chinaExtraTransInfo);
        $order->setExtendInfo($extendInfo . '');

        $env = new Env();
        $env->setTerminalType($params['terminal_type']);
        $env->setOsType($params['os_type']);
        $order->setEnv($env);

        $alipayPayRequest->setPaymentAmount($amount);
        $alipayPayRequest->setOrder($order);

        $settlementStrategy = new SettlementStrategy();
        $settlementStrategy->setSettlementCurrency($params['settlement_strategy']['currency']);
        $alipayPayRequest->setSettlementStrategy($settlementStrategy);

        return $this->alipayClient->execute($alipayPayRequest);
    }

    /**
     * @return Model\NotifyPaymentRequest
     * @throws Exception
     */
    public function getNotify()
    {
        $alipayAcNotify       = new AlipayAcNotify();
        $notifyPaymentRequest = $alipayAcNotify->getNotifyPaymentRequest();
        $result               = SignatureTool::verify(
            $notifyPaymentRequest->getHttpMethod(),
            $_SERVER['PHP_SELF'],
            $notifyPaymentRequest->getClientId(),
            $notifyPaymentRequest->getRsqTime(),
            $notifyPaymentRequest->getRsqBody(),
            $notifyPaymentRequest->getSignature(),
            $this->alipayPublicKey
        );
        if (0 === $result) {
            throw new Exception('Invalid Signature');
        }

        return $notifyPaymentRequest;
    }

    /**
     * @return void
     */
    public function sendNotifyResponse()
    {
        $alipayAcNotify = new AlipayAcNotify();
        $alipayAcNotify->sendNotifyResponse();
    }

    /**
     * @return void
     */
    public function sendNotifyResponseWithRSA()
    {
        $alipayAcNotify = new AlipayAcNotify();
        $alipayAcNotify->sendNotifyResponseWithRSA([
            'merchantPrivateKey' => $this->merchantPrivateKey,
        ]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws Exception
     */
    public function authConsult($params)
    {
        $params = array_merge([
            'customer_belongs_to' => null, // *
            'auth_client_id'      => null,
            'auth_redirect_url'   => null, // *
            'scopes'              => null, // *
            'auth_state'          => null, // *
            'terminal_type'       => null, // *
            'os_type'             => null,
            'os_version'          => null,
        ], $params);
        $alipayAuthConsultRequest = new AlipayAuthConsultRequest();
        $alipayAuthConsultRequest->setPath($this->getPath('authorizations/consult'));
        $alipayAuthConsultRequest->setClientId($this->client_id);

        $alipayAuthConsultRequest->setCustomerBelongsTo($params['customer_belongs_to']);
        $alipayAuthConsultRequest->setAuthClientId($params['auth_client_id']);
        $alipayAuthConsultRequest->setAuthRedirectUrl($params['auth_redirect_url']);
        $alipayAuthConsultRequest->setScopes($params['scopes']);
        $alipayAuthConsultRequest->setAuthState($params['auth_state'] ?? IdTool::CreateAuthState());
        $alipayAuthConsultRequest->setTerminalType($params['terminal_type']);
        $alipayAuthConsultRequest->setOsType($params['os_type']);
        $alipayAuthConsultRequest->setOsVersion($params['os_version']);

        return $this->alipayClient->execute($alipayAuthConsultRequest);
    }

    /**
     * @param $params
     * @return mixed
     * @throws Exception
     */
    public function authApplyToken($params)
    {
        $params = array_merge([
            'grant_type'          => null, // *
            'customer_belongs_to' => null,
            'auth_code'           => null, // *
            'refresh_token'       => null, // *
        ], $params);

        $AlipayAuthApplyTokenRequest = new AlipayAuthApplyTokenRequest();
        $AlipayAuthApplyTokenRequest->setPath($this->getPath('authorizations/applyToken'));
        $AlipayAuthApplyTokenRequest->setClientId($this->client_id);

        $AlipayAuthApplyTokenRequest->setGrantType($params['grant_type']);
        $AlipayAuthApplyTokenRequest->setCustomerBelongsTo($params['customer_belongs_to']);
        $AlipayAuthApplyTokenRequest->setAuthCode($params['auth_code']);
        $AlipayAuthApplyTokenRequest->setRefreshToken($params['refresh_token']);

        return $this->alipayClient->execute($AlipayAuthApplyTokenRequest);
    }

    /**
     * @param $params
     * @return mixed
     * @throws Exception
     */
    public function payAgreement($params)
    {
        $params = array_merge([
            'notify_url' => null,
            'return_url' => null,
            'amount'     => [
                'currency' => null,
                'value'    => null,
            ],
            'order' => [
                'id'          => null,
                'desc'        => null,
                'extend_info' => [
                    'china_extra_trans_info' => [
                        'business_type' => null,
                    ],
                ],
            ],
            'goods' => [
                [
                    'id'          => null,
                    'name'        => null,
                    'category'    => null,
                    'brand'       => null,
                    'unit_amount' => null,
                    'quantity'    => null,
                    'sku_name'    => null,
                ],
            ],
            'merchant' => [
                'MCC'           => null,
                'name'          => null,
                'display_name'  => null,
                'address'       => null,
                'register_date' => null,
                'store'         => null,
                'type'          => null,
            ],
            'buyer' => [
                'id'   => null,
                'name' => [
                    'first_name' => null,
                    'last_name'  => null,
                ],
                'phone_no' => null,
                'email'    => null,
            ],
            'payment_request_id' => null,
            'payment_method'     => [
                'payment_method_type' => null,
                'payment_method_id'   => null,
            ],
            'settlement_strategy' => [
                'currency' => null,
            ],
        ], $params);

        $alipayPayRequest = new AlipayPayRequest();
        $alipayPayRequest->setPath($this->getPath('payments/pay'));
        $alipayPayRequest->setClientId($this->client_id);

        $alipayPayRequest->setProductCode(ProductCodeType::AGREEMENT_PAYMENT);
        $alipayPayRequest->setPaymentNotifyUrl($params['notify_url']);
        $alipayPayRequest->setPaymentRedirectUrl($params['return_url']);
        $alipayPayRequest->setPaymentRequestId($params['payment_request_id'] ?? IdTool::CreatePaymentRequestId());

        $paymentMethod = new PaymentMethod();
        $paymentMethod->setPaymentMethodType($params['payment_method']['payment_method_type']);
        $paymentMethod->setPaymentMethodId($params['payment_method']['payment_method_id']);
        $alipayPayRequest->setPaymentMethod($paymentMethod);

        $amount = new Amount();
        $amount->setCurrency($params['amount']['currency']);
        $amount->setValue($params['amount']['value']);
        $alipayPayRequest->setPaymentAmount($amount);

        $order = new Order();
        $order->setOrderDescription($params['order']['desc']);
        $order->setReferenceOrderId($params['order']['id'] ?? IdTool::CreateReferenceOrderId());
        $order->setOrderAmount($amount);

        $chinaExtraTransInfo = new ChinaExtraTransInfo();
        $chinaExtraTransInfo->setBusinessType($params['order']['extend_info']['china_extra_trans_info']['business_type']);
        $extendInfo = $chinaExtraTransInfo;

        $extendInfo = new ExtendInfo();
        $extendInfo->setChinaExtraTransInfo($chinaExtraTransInfo);
        $order->setExtendInfo($extendInfo . '');

        $env = new Env();
        $env->setTerminalType($params['terminal_type']);
        $env->setOsType($params['os_type']);
        $order->setEnv($env);

        $goodsArr = [];
        if (!empty($params['goods'])) {
            foreach ($params['goods'] as $good) {
                $goods = new Goods();
                $goods->setReferenceGoodsId($good['id'] ?? IdTool::CreateReferenceGoodsId());
                $goods->setGoodsName($good['name']);
                $goods->setGoodsCategory($good['category']);
                $goods->setGoodsBrand($good['brand']);
                $goods->setGoodsUnitAmount($good['unit_amount']);
                $goods->setGoodsQuantity($good['quantity']);
                $goods->setGoodsSkuName($good['sku_name']);
                $goodsArr[] = $goods;
            }
            $order->setGoods($goodsArr);
        }
        if (!empty($params['merchant'])) {
            $merchant = new Merchant();
            $merchant->setReferenceMerchantId($params['merchant']['id'] ?? IdTool::CreateReferenceMerchantId());
            $merchant->setMerchantMCC($params['merchant']['MCC']);
            $merchant->setMerchantName($params['merchant']['name']);
            $merchant->setMerchantDisplayName($params['merchant']['display_name']);
            $merchant->setMerchantAddress($params['merchant']['address']);
            $merchant->setMerchantRegisterDate($params['merchant']['register_date']);
            $merchant->setStore($params['merchant']['store']);
            $merchant->setMerchantType($params['merchant']['type']);
            $order->setMerchant($merchant);
        }

        if (!empty($params['buyer'])) {
            $buyer = new Buyer();
            $buyer->setReferenceBuyerId($params['buyer']['id'] ?? IdTool::CreateBuyerId());
            $buyer->setBuyerName($params['buyer']['name']);
            $buyer->setBuyerPhoneNo($params['buyer']['phone_no']);
            $buyer->setBuyerEmail($params['buyer']['email']);
            $order->setBuyer($buyer);
        }

        $alipayPayRequest->setOrder($order);

        $settlementStrategy = new SettlementStrategy();
        $settlementStrategy->setSettlementCurrency($params['settlement_strategy']['currency']);
        $alipayPayRequest->setSettlementStrategy($settlementStrategy);

        $alipayPayRequest->setIsAuthorization(true);

        return $this->alipayClient->execute($alipayPayRequest);
    }
}
