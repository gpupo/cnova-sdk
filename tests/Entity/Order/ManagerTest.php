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

namespace Gpupo\Tests\CnovaSdk\Entity\Order;

class ManagerTest extends OrderTestCaseAbstract
{
    public function testObtemListaPedidos()
    {
        $list = $this->getList();
        $this->assertInstanceOf('\Gpupo\Common\Entity\CollectionInterface',
            $list);

        return $list;
    }

    /**
     * @depends testObtemListaPedidos
     */
    public function testRecuperaInformacoesDeUmPedidoEspecifico($list)
    {
        return $this->markTestSkipped('API Token ausente');

        foreach ($list as $order) {
            $info = $this->factoryManager()->findById($order->getId());

            $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Order\Order',
            $info);

            $this->assertEquals($order->getId(), $info->getId());
            $this->assertEquals($order->getStatus(), $info->getStatus());
        }
    }
}
