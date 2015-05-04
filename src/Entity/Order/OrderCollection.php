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

use Gpupo\CnovaSdk\Entity\MetadataContainerAbstract;

class OrderCollection extends MetadataContainerAbstract
{
    protected function getKey()
    {
        return 'orders';
    }

    protected function factoryEntity(array $data)
    {
        return new Order($data);
    }
}
