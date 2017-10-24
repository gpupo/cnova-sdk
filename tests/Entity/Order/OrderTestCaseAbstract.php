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

namespace Gpupo\Tests\CnovaSdk\Entity\Order;

use Gpupo\CnovaSdk\Entity\Order\Customer\Customer;
use Gpupo\CnovaSdk\Entity\Order\Order;
use Gpupo\Tests\CnovaSdk\TestCaseAbstract;

abstract class OrderTestCaseAbstract extends TestCaseAbstract
{
    protected function getManager($filename = null)
    {
        if (empty($filename)) {
            $filename = 'Orders.json';
        }

        $manager = $this->getFactory()->factoryManager('order');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Order/'.$filename));

        return $manager;
    }

    /**
     * return \Gpupo\CnovaSdk\Entity\Order\OrderCollection;.
     */
    public function getList()
    {
        $list = $this->getManager()->fetch();

        return $list;
    }

    public function dataProviderOrderCollection()
    {
        $list = [];
        foreach ($this->getList() as $order) {
            $list[][] = $order;
        }

        if (empty($list)) {
            throw new \Exception('Lista Vazia!');
        }

        return $list;
    }

    public function dataProviderCustomers()
    {
        $list = [];

        foreach ($this->getList() as $order) {
            if (!$order instanceof Order) {
                throw new \Exception('Objeto não é Order');
            }
            $list[] = [$order->getCustomer()];
        }

        return $list;
    }

    public function dataProviderPhones()
    {
        $list = [];

        foreach ($this->dataProviderCustomers() as $data) {
            $customer = current($data);
            if (!$customer instanceof Customer) {
                throw new \Exception('Objeto não é Customer');
            }
            $list[] = [$customer->getPhones()];
        }

        return $list;
    }
}
