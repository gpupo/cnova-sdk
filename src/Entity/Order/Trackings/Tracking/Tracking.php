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

namespace Gpupo\CnovaSdk\Entity\Order\Trackings\Tracking;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class Tracking extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return  [
            'items'             =>  'object',
            'controlPoint'      =>  'string',
            'description'       =>  'string',
            'occurredAt'        =>  'string',
            'carrier'           =>  'object',
            'url'               =>  'string',
            'number'            =>  'string',
            'sellerDeliveryId'  =>  'string',
            'cte'               =>  'string',
            'invoice'           =>  'object',
        ];
    }
}