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

use Gpupo\CnovaSdk\Entity\Order\Order;
use Gpupo\CnovaSdk\Entity\Order\Trackings\Tracking\Tracking;

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
        $manager = $this->getManager('OrderId.json');
        $order = $manager->findById(975101);
        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Order\Order', $order);
        $this->assertEquals(975101, $order->getId());
        $this->assertEquals('2015-04-30T14:54:29.000-03:00', $order->getPurchasedAt());
    }

    /**
     * @dataProvider dataProviderOrderCollection
     */
    public function testMovePedidoParaEnviado(Order $order)
    {
        $manager = $this->getManager()->setDryRun();
        $tracking = new Tracking(require $this->getResourceFilePath('fixture/Order/tracking.php'));
        $this->assertTrue($manager->moveToSent($order, $tracking));
    }

    /**
     * @dataProvider dataProviderOrderCollection
     * @expectedException \Gpupo\CommonSdk\Exception\SchemaException
     */
    public function testFalhaAoMoverPedidoParaEnviadoSemInformaçõesCompletas(Order $order)
    {
        $manager = $this->getManager()->setDryRun();
        $tracking = new Tracking();

        $this->assertTrue($manager->moveToSent($order, $tracking));
    }
}
