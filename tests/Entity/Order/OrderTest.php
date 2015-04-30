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

use Gpupo\Common\Entity\CollectionInterface;
use Gpupo\CnovaSdk\Entity\Order\OrderCollection;

class OrderTest extends OrderTestCaseAbstract
{
    public function testCadaItemDeUmaListaEUmObjeto()
    {
        $list = $this->getList();

        foreach ($list as $item) {
            $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Order\Order', $item);
        }

        return $list;
    }

    /**
     * @depends testCadaItemDeUmaListaEUmObjeto
     */
    public function testCadaPedidoPossuiObjetoBilling(OrderCollection $list)
    {
        foreach ($list as $item) {
            $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Order\Billing\Billing', $item->getBilling());
        }
    }

    /**
     * @depends testCadaItemDeUmaListaEUmObjeto
     */
    public function testCadaPedidoPossuiObjetoCliente(OrderCollection $list)
    {
        foreach ($list as $item) {
            $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Order\Customer\Customer', $item->getCustomer());
        }
    }

    /**
     * @depends testCadaItemDeUmaListaEUmObjeto
     */
    public function testCadaPedidoPossuiObjetoFrete(OrderCollection $list)
    {
        foreach ($list as $item) {
            $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Order\Freight\Freight', $item->getFreight());
        }
    }

    /**
     * @depends testCadaItemDeUmaListaEUmObjeto
     */
    public function testCadaPedidoPossuiObjetoContendoEnderecoDeEntrega(OrderCollection $list)
    {
        foreach ($list as $item) {
            $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Order\Shipping\Shipping', $item->getShipping());
        }
    }

    /**
     * @depends testCadaItemDeUmaListaEUmObjeto
     */
    public function testCadaPedidoPossuiColecaoDeRastreamentos(OrderCollection $list)
    {
        foreach ($list as $item) {
            $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Order\Trackings\Trackings', $item->getTrackings());
        }
    }

    /**
     * @depends testCadaItemDeUmaListaEUmObjeto
     */
    public function testCadaPedidoPossuiColecaoDeProdutos(OrderCollection $list)
    {
        foreach ($list as $item) {
            $collection = $item->getItens();

            $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Order\Itens\Itens', $collection);

            foreach ($collection as $product) {
                $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Order\Itens\Product\Product', $product);
            }
        }
    }
}
