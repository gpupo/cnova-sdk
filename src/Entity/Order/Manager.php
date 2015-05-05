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
        'saveStatus'    => ['POST', '/order/{itemId}/trackings/{status}'],
        'findById'      => ['GET', '/orders/{itemId}'],
        'fetch'         => ['GET', '/orders/status/{status}/?_offset={offset}&_limit={limit}'],
    ];

    public function saveStatus(Order $order)
    {
        $status = $order->getStatus();

        $this->validateStatus($status, $order);

        return $this->execute($this->factoryMap('saveStatus',
            ['itemId' => $order->getId(), 'status' => $status]), $order->toJson());
    }

    protected function validateStatus($status, Order $order)
    {
        if ($status == 'sent') {
            $order->getTrackings()->activeRequiredSchema();
        }
    }
}
