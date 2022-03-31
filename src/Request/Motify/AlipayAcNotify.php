<?php

namespace NiZerin\Request\Motify;

use NiZerin\Model\NotifyPaymentRequest;
use NiZerin\Tool\SignatureTool;

class AlipayAcNotify
{
    /**
     * @return NotifyPaymentRequest
     */
    public function getNotifyPaymentRequest()
    {
        $notifyPaymentRequest = new NotifyPaymentRequest();
        $notifyPaymentRequest->setHttpMethod($_SERVER['REQUEST_METHOD']);
        $notifyPaymentRequest->setClientId($_SERVER['HTTP_CLIENT_ID']);
        $notifyPaymentRequest->setRsqTime($_SERVER['HTTP_REQUEST_TIME']);
        $notifyPaymentRequest->setRsqBody(file_get_contents('php://input'));
        if (preg_match('/signature=(?<signature>.*?)(?:$|,)/', $_SERVER['HTTP_SIGNATURE'], $matches)) {
            $notifyPaymentRequest->setSignature($matches['signature']);
        }
        return $notifyPaymentRequest;
    }

    /**
     * @return void
     */
    public function sendNotifyResponse()
    {
        echo '{"result":{"resultCode":"SUCCESS","resultMessage":"success","resultStatus":"S"}}';
    }

    /**
     * @param array $params
     * @return void
     */
    public function sendNotifyResponseWithRSA(array $params = array(
        'merchantPrivateKey' => '',
    ))
    {
        $reqTime = date('c', time());
        $content = '{"result":{"resultCode":"SUCCESS","resultMessage":"success","resultStatus":"S"}}';
        header('Content-Type:application/json; charset=UTF-8');
        header('Response-Time:' . $reqTime);
        header('Client-Id:' . $_SERVER['HTTP_CLIENT_ID']);
        header('Signature:' . 'algorithm=RSA256,keyVersion=1,signature=' . SignatureTool::sign(
                $_SERVER['REQUEST_METHOD'],
                $_SERVER['PHP_SELF'],
                $_SERVER['HTTP_CLIENT_ID'],
                $reqTime,
                $content,
                $params['merchantPrivateKey']
            ));
        echo $content;
    }
}
