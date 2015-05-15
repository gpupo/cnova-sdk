<?php

/*
 * This file is part of gpupo/cnova-sdk
 *
 * (c) Gilmar Pupo <g@g1mr.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @version 1
 */

namespace Gpupo\CnovaSdk\Entity\Order\Items\Product;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string getId()
 * @method setId(string $id)
 * @method string getSkuSellerId()
 * @method setSkuSellerId(string $skuSellerId)
 * @method string getName()
 * @method setName(string $name)
 * @method float getSalePrice()
 * @method setSalePrice(float $salePrice)
 * @method boolean getSent()
 * @method setSent(boolean $sent)
 * @method Gpupo\CnovaSdk\Entity\Order\Items\Product\Freight\Freight getFreight()
 * @method setFreight(Gpupo\CnovaSdk\Entity\Order\Items\Product\Freight\Freight $freight)
 * @method Gpupo\CnovaSdk\Entity\Order\Items\Product\GiftWrap\GiftWrap getGiftWrap()
 * @method setGiftWrap(Gpupo\CnovaSdk\Entity\Order\Items\Product\GiftWrap\GiftWrap $giftWrap)
 */
class Product extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return  [
            'id'            => 'string',
            'skuSellerId'   => 'string',
            'name'          => 'string',
            'salePrice'     => 'number',
            'sent'          => 'boolean',
            'freight'       => 'object',
            'giftWrap'      => 'object',
        ];
    }
}
