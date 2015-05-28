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
use Gpupo\CnovaSdk\Entity\Order\Trackings\Tracking\Tracking;

class Manager extends ManagerAbstract
{
    protected $entity = 'Order';

    protected $maps = [
        'saveStatus'    => ['POST', '/order/{itemId}/trackings/{status}'],
        'findById'      => ['GET', '/orders/{itemId}'],
        'fetch'         => ['GET', '/orders/status/{status}/?_offset={offset}&_limit={limit}'],
    ];

    protected function saveStatus(Order $order, $json)
    {
        $status = $order->getStatus();

        return $this->execute($this->factoryMap('saveStatus',
            ['itemId' => $order->getId(), 'status' => $status]), $json);
    }

    protected function move($statusTo, Order $order, Tracking $tracking)
    {
        if (in_array($statusTo, ['sent', 'delivered', 'cancel'], true)) {
            $order->setStatus($statusTo);

            return $this->saveStatus($order, $tracking->toJson());
        }

        return false;
    }

    /**
     * Obtém a lista de pedidos recém aprovados e que esperam processamento
     */
    public function fetchQuee($offset = 0, $limit = 50, array $parameters = [])
    {
        return $this->fetch($offset, $limit, array_merge(['status' => 'approved'], $parameters));
    }

    /**
     * Registra uma nova operação de tracking de Envio para os itens do pedido.
     */
    public function moveToSent(Order $order, Tracking $tracking)
    {
        return $this->move('sent', $order, $tracking);
    }

    /**
     * Registra uma nova operação de tracking de Entrega para os itens do pedido.
     */
    public function moveToDelivered(Order $order, Tracking $tracking)
    {
        return $this->move('delivered', $order, $tracking);
    }

    /**
     * Registra uma nova operação de tracking de Entrega para os itens do pedido.
     */
    public function moveToCanceled(Order $order, Tracking $tracking)
    {
        return $this->move('cancel', $order, $tracking);
    }
}
