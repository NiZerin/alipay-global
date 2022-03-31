<?php
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
