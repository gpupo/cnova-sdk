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
use Gpupo\Tests\CnovaSdk\TestCaseAbstract;

abstract class OrderTestCaseAbstract extends TestCaseAbstract
{
    protected function getManager($filename = 'Orders.json')
    {
        return $this->getFactory()->factoryManager('order')
            ->setDryRun($this->factoryResponseFromFixture('fixture/Order/'.$filename));
    }

    protected function getList()
    {
        return $this->getManager()->fetch();
    }

    public function dataProviderOrderCollection()
    {
        $list = [];
        foreach ($this->getList() as $order) {
            $list[][] = new Order($order);
        }

        return $list;
    }
}
