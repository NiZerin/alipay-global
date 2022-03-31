<?php
namespace NiZerin\Request\Users;

use NiZerin\Request\AlipayRequest;

class AlipayUserQueryInfoRequest extends AlipayRequest
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
