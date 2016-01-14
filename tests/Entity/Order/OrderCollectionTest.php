<?php

/*
 * This file is part of gpupo/cnova-sdk
 *
 * (c) Gilmar Pupo <g@g1mr.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For more information, see
 * <http://www.g1mr.com/cnova-sdk/>.
 */

namespace Gpupo\Tests\CnovaSdk\Entity;

use Gpupo\CnovaSdk\Entity\Order\OrderCollection;

class OrderCollectionTest extends MetadataContainerTestAbstract
{
    protected function factoryOrderCollection()
    {
        $data = $this->getResourceJson('fixture/Order/Orders.json');

        $container = new OrderCollection($data);

        return $container;
    }

    public function dataProviderContainer()
    {
        return [
            [$this->factoryOrderCollection(), ['totalRows' => 2]],
        ];
    }

    /**
     * @dataProvider dataProviderContainer
     */
    public function testCadaElementoÉUmObjetoOrder(OrderCollection $container)
    {
        foreach ($container as $order) {
            $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Order\Order', $order);
        }
    }

    public function testCadaElementoPossuiDadosCorretos()
    {
        $list = $this->factoryOrderCollection();
        $order = $list->first();
        $this->assertSame(975101, $order->getId());
        $this->assertSame('2015-04-30T14:54:29.000-03:00', $order->getPurchasedAt());
    }
}
