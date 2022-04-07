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

class ContactInfo
{
    public $contactNo;
    public $contactType;

    /**
     * @return mixed
     */
    public function getContactNo()
    {
        return $this->contactNo;
    }

    /**
     * @param mixed $contactNo
     */
    public function setContactNo($contactNo)
    {
        $this->contactNo = $contactNo;
    }

    /**
     * @return mixed
     */
    public function getContactType()
    {
        return $this->contactType;
    }

    /**
     * @param mixed $contactType
     */
    public function setContactType($contactType)
    {
        $this->contactType = $contactType;
    }
}
