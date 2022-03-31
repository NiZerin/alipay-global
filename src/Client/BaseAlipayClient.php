<?php

namespace NiZerin\Client;

use NiZerin\Tool\SignatureTool;
use \Exception;

abstract class BaseAlipayClient
{
    /** @var int */
    const DEFAULT_KEY_VERSION = 1;

    private $gatewayUrl;
    private $merchantPrivateKey;
    private $alipayPublicKey;

    /**
     * @param $gatewayUrl
     * @param $merchantPrivateKey
     * @param $alipayPublicKey
     */
    public function __construct($gatewayUrl, $merchantPrivateKey, $alipayPublicKey)
    {
        $this->gatewayUrl = $gatewayUrl;
        $this->merchantPrivateKey = $merchantPrivateKey;
        $this->alipayPublicKey = $alipayPublicKey;
    }

    /**
     * @param $request
     * @return mixed
     * @throws Exception
     */
    public function execute($request)
    {
        $this->checkRequestParam($request);

        $clientId = $request->getClientId();
        $httpMethod = $request->getHttpMethod();
        $path = $request->getPath();
        $keyVersion = $request->getKeyVersion();
        $reqTime = date(DATE_ISO8601);
        $reqBody = json_encode($request);

        $signValue = $this->genSignValue($httpMethod, $path, $clientId, $reqTime, $reqBody);
        $baseHeaders = $this->buildBaseHeader($reqTime, $clientId, $keyVersion, $signValue);
        $customHeaders = $this->buildCustomHeader();

        if (isset($customHeaders) && count($customHeaders) > 0) {
            $headers = array_merge($baseHeaders, $customHeaders);
        } else {
            $headers = $baseHeaders;
        }

        $requestUrl = $this->genRequestUrl($path);
        // print_r($requestUrl);
        // echo '<br>';
        // print_r($httpMethod);
        // echo '<br>';
        // print_r($headers);
        // echo '<br>';
        // print_r($reqBody);
        // echo '<br>';
        $rsp = $this->sendRequest($requestUrl, $httpMethod, $headers, $reqBody);
        if (!isset($rsp) || $rsp == null) {
            throw new Exception("HttpRpcResult is null.");
        }

        $rspBody = $rsp->getRspBody();
        $rspSignValue = $rsp->getRspSign();
        $rspTime = $rsp->getRspTime();

        $alipayRsp = json_decode($rspBody);

        $result = $alipayRsp->result;
        if (!isset($result)) {
            throw new Exception("Response data error,result field is null,rspBody:" . $rspBody);
        }

        if (!isset($rspSignValue) || trim($rspSignValue) === "" || !isset($rspTime) || trim($rspTime) === "") {
            return $alipayRsp;
        }

        $isVerifyPass = $this->checkRspSign($httpMethod, $path, $clientId, $rspTime, $rspBody, $rspSignValue);

        if (!$isVerifyPass) {
            throw new Exception("Response signature verify fail.");
        }
        return $alipayRsp;
    }

    /**
     * @param $request
     * @return void
     * @throws Exception
     */
    private function checkRequestParam($request)
    {
        if (!isset($request)) {
            throw new Exception("alipayRequest can't null");
        }

        $clientId = $request->getClientId();
        $httpMehod = $request->getHttpMethod();
        $path = $request->getPath();
        $keyVersion = $request->getKeyVersion();

        if (!isset($this->gatewayUrl) || trim($this->gatewayUrl) === "") {
            throw new Exception("clientId can't null");
        }

        if (!isset($clientId) || trim($clientId) === "") {
            throw new Exception("clientId can't null");
        }

        if (!isset($httpMehod) || trim($httpMehod) === "") {
            throw new Exception("httpMehod can't null");
        }

        if (!isset($path) || trim($path) === "") {
            throw new Exception("path can't null");
        }

        if (strpos($path, '/') != 0) {
            throw new Exception("path must start with /");
        }

        if (isset($keyVersion) && !is_numeric($keyVersion)) {
            throw new Exception("keyVersion must be numeric");
        }
    }

    /**
     * @param $httpMethod
     * @param $path
     * @param $clientId
     * @param $reqTime
     * @param $reqBody
     * @return string
     * @throws Exception
     */
    private function genSignValue($httpMethod, $path, $clientId, $reqTime, $reqBody)
    {
        try {
            $signValue = SignatureTool::sign($httpMethod, $path, $clientId, $reqTime, $reqBody, $this->merchantPrivateKey);
        } catch (Exception $e) {
            throw new Exception($e);
        }
        return $signValue;
    }

    /**
     * @param $httpMethod
     * @param $path
     * @param $clientId
     * @param $rspTime
     * @param $rspBody
     * @param $rspSignValue
     * @return false|int
     * @throws Exception
     */
    private function checkRspSign($httpMethod, $path, $clientId, $rspTime, $rspBody, $rspSignValue)
    {
        try {
            $isVerify = SignatureTool::verify($httpMethod, $path, $clientId, $rspTime, $rspBody, $rspSignValue, $this->alipayPublicKey);
        } catch (Exception $e) {
            throw new Exception($e);
        }
        return $isVerify;
    }

    /**
     * @param $requestTime
     * @param $clientId
     * @param $keyVersion
     * @param $signValue
     * @return array
     */
    private function buildBaseHeader($requestTime, $clientId, $keyVersion, $signValue)
    {
        $baseHeader = array();
        $baseHeader[] = "Content-Type:application/json; charset=UTF-8";
        $baseHeader[] = "User-Agent:global-alipay-sdk-php";
        $baseHeader[] = "Request-Time:" . $requestTime;
        $baseHeader[] = "client-id:" . $clientId;

        if (!isset($keyVersion)) {
            $keyVersion = self::DEFAULT_KEY_VERSION;
        }
        $signatureHeader = "algorithm=RSA256,keyVersion=" . $keyVersion . ",signature=" . $signValue;
        $baseHeader[] = "Signature:" . $signatureHeader;
        return $baseHeader;
    }

    /**
     * @param $path
     * @return string
     */
    private function genRequestUrl($path)
    {
        if (strpos($this->gatewayUrl, "https://") != 0) {
            $this->gatewayUrl = "https://" . $this->gatewayUrl;
        }

        if (substr_compare($this->gatewayUrl, '/', -strlen('/')) === 0) {
            $len = strlen($this->gatewayUrl);
            $this->gatewayUrl = substr($this->gatewayUrl, 0, $len - 1);
        }

        return $this->gatewayUrl . $path;

    }

    /**
     * @return mixed
     */
    abstract protected function buildCustomHeader();

    /**
     * @param $requestUrl
     * @param $httpMethod
     * @param $headers
     * @param $reqBody
     * @return mixed
     */
    abstract protected function sendRequest($requestUrl, $httpMethod, $headers, $reqBody);
}
