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

use Gpupo\CnovaSdk\Entity\ManagerAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class Manager extends ManagerAbstract
{
    protected $entity = 'Product';

    protected $maps = [
        'findById'  => ['GET', '/sellerItems/{itemId}'],
        'fetch'     => ['GET', '/sellerItems?offset={offset}&limit={limit}'],
    ];

    public function update(EntityInterface $entity, EntityInterface $existent)
    {
    }
}
