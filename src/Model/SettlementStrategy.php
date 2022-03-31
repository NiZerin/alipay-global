<?php
namespace NiZerin\Model;

class SettlementStrategy
{
    public $settlementCurrency;

    /**
     * @return mixed
     */
    public function getSettlementCurrency()
    {
        return $this->settlementCurrency;
    }

    /**
     * @param String $settlementCurrency
     * @return void
     */
    public function setSettlementCurrency(String $settlementCurrency)
    {
        $this->settlementCurrency = $settlementCurrency;
    }
}
