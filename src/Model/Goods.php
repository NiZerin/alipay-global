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

class Goods
{
    public $referenceGoodsId;
    public $goodsName;
    public $goodsCategory;
    public $goodsBrand;
    public $goodsUnitAmount;
    public $goodsQuantity;
    public $goodsSkuName;

    /**
     * @return string
     */
    public function getReferenceGoodsId()
    {
        return $this->referenceGoodsId;
    }

    /**
     * @param string $referenceGoodsId
     */
    public function setReferenceGoodsId($referenceGoodsId)
    {
        $this->referenceGoodsId = $referenceGoodsId;
    }

    /**
     * @return string
     */
    public function getGoodsName()
    {
        return $this->goodsName;
    }

    /**
     * @param string $goodsName
     */
    public function setGoodsName($goodsName)
    {
        $this->goodsName = $goodsName;
    }

    /**
     * @return string
     */
    public function getGoodsCategory()
    {
        return $this->goodsCategory;
    }

    /**
     * @param string $goodsCategory
     */
    public function setGoodsCategory($goodsCategory)
    {
        $this->goodsCategory = $goodsCategory;
    }

    /**
     * @return string
     */
    public function getGoodsBrand()
    {
        return $this->goodsBrand;
    }

    /**
     * @param string $goodsBrand
     */
    public function setGoodsBrand($goodsBrand)
    {
        $this->goodsBrand = $goodsBrand;
    }

    /**
     * @return Amount
     */
    public function getGoodsUnitAmount()
    {
        return $this->goodsUnitAmount;
    }

    /**
     * @param Amount $goodsUnitAmount
     */
    public function setGoodsUnitAmount($goodsUnitAmount)
    {
        $this->goodsUnitAmount = $goodsUnitAmount;
    }

    /**
     * @return string
     */
    public function getGoodsQuantity()
    {
        return $this->goodsQuantity;
    }

    /**
     * @param string $goodsQuantity
     */
    public function setGoodsQuantity($goodsQuantity)
    {
        $this->goodsQuantity = $goodsQuantity;
    }

    /**
     * @return string
     */
    public function getGoodsSkuName()
    {
        return $this->goodsSkuName;
    }

    /**
     * @param string $goodsSkuName
     */
    public function setGoodsSkuName($goodsSkuName)
    {
        $this->goodsSkuName = $goodsSkuName;
    }
}
