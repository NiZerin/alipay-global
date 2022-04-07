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

class ExtendInfo
{
    public $chinaExtraTransInfo;

    /**
     * @param ChinaExtraTransInfo $chinaExtraTransInfo
     * @return void
     */
    public function setChinaExtraTransInfo(ChinaExtraTransInfo $chinaExtraTransInfo)
    {
        $this->chinaExtraTransInfo = $chinaExtraTransInfo;
    }

    /**
     * @return false|string
     */
    public function __toString()
    {
        return json_encode($this);
    }
}
