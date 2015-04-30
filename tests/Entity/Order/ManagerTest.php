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
    public function testRecuperaInformacoesDeUmPedidoEspecifico()
    {
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
        if (!$this->hasToken()) {
            return $this->markSkipped('API Token ausente');
        }

        $flux = ['approved' => 'sent'];

        $i = 0;
        foreach ($list as $order) {
            $i++;
            $manager = $this->getManager();
            $currentStatus = $order->getStatus();
            if (array_key_exists($currentStatus, $flux)) {
                $newStatus = $flux[$currentStatus];
                $order->getStatus()->setStatus($newStatus);
                $this->assertTrue($manager->saveStatus($order));
                $orderUpdated = $manager->findById($order->getId());
                $this->assertEquals($newStatus, $orderUpdated->getStatus());
            }
        }

        if ($i < 1) {
            $this->markSkipped('Sem Pedidos para atualizar');
        }
    }
}
