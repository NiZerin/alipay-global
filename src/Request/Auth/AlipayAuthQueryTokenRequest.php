<?php
namespace NiZerin\Request\Auth;

use NiZerin\Request\AlipayRequest;

class AlipayAuthQueryTokenRequest extends AlipayRequest
{
    public $accessToken;

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param mixed $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }
}
