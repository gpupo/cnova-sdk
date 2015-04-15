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

namespace Gpupo\CnovaSdk\Entity\Order;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class Order extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return  [
            'id'                    => 'string',
            'orderMarketplaceId'    => 'string',
            'paymentType'           => 'string',
            'purchasedAt'           => 'string',
            'approvedAt'            => 'string',
            'status'                => 'string',
            'totalAmount'           => 'number',
            'totalDiscountAmount'   => 'number',
            'billing'               => 'object',
            'customer'              => 'object',
            'freight'               => 'object',
            'itens'                 => 'object',
            'shipping'              => 'object',
            'trackings'             => 'object',
        ];
    }
}
