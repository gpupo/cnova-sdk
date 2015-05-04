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
