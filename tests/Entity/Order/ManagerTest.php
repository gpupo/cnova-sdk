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
        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Order\OrderCollection',
            $list);

        return $list;
    }

    /**
     * @depends testObtemListaPedidos
     */
    public function testRecuperaInformacoesDeUmPedidoEspecifico()
    {
        return $this->markIncomplete();
        $manager = $this->getManager('OrderId.json');
        $order = $manager->findById(14080);
        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Order\Order', $order);
        $this->assertEquals(14080, $order->getId());
    }

    /**
     * @depends testObtemListaPedidos
     */
    public function testAtualizaStatusDeUmPedido($list)
    {
        $manager = $this->getManager()->setDryRun();

        foreach ($list as $order) {
            $order->setStatus('sent');
            $this->assertTrue($manager->saveStatus($order));
        }
    }
}
