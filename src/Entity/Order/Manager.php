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

use Gpupo\CnovaSdk\Entity\ManagerAbstract;

class Manager extends ManagerAbstract
{
    protected $entity = 'Order';

    protected $maps = [
        'findById'  => ['GET', '/orders/{itemId}'],
        'fetch'     => ['GET', '/orders/{status}/?_offset={offset}&_limit={limit}'],
    ];

    /**
     * @param int   $offset
     * @param int   $limit
     * @param array $parameters
     *
     * @return \Gpupo\CommonSdk\Entity\CollectionInterface
     */
    public function fetch($offset = 1, $limit = 50, array $parameters = [])
    {
        return parent::fetch($offset, $limit, array_merge([
            'status'        => 'new',
            'purchaseAt'    => '',
        ], $parameters));
    }
}
