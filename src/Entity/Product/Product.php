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

namespace Gpupo\CnovaSdk\Entity\Product;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class Product extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return  [
            'skuSellerId' => 'string',
            'skuId' => 'string',
            'productSellerId' => 'string',
            'title' => 'string',
            'description' => 'string',
            'brand' => 'string',
            'gtin' => 'array',
            'categories' => 'array',
            'images' => 'array',
            'videos' => 'array',
                'price' => 'object',
                'stock' => 'object',
                'dimensions' => 'object',
                'giftWrap' => 'object',
                'attributes' => 'object',
        ];
    }
}
