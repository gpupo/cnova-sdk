<?php

/*
 * This file is part of gpupo/cnova-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
 */

namespace Gpupo\Tests\CnovaSdk\Entity;

use Gpupo\CnovaSdk\Entity\Order\OrderCollection;
use Gpupo\Tests\CommonSdk\Entity\Metadata\MetadataContainerTestAbstract;

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
        $this->assertSame('975101', $order->getId());
        $this->assertSame('2015-04-30T14:54:29.000-03:00', $order->getPurchasedAt());
    }
}
