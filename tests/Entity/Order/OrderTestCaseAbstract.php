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
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Order/' . $filename));

        return $manager;
    }

    /**
     * return \Gpupo\CnovaSdk\Entity\Order\OrderCollection;.
     */
    public function getList()
    {
        $list =  $this->getManager()->fetch();

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
