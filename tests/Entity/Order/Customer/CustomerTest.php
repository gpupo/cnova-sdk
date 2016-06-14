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
namespace Gpupo\Tests\CnovaSdk\Entity\Order\Customer;

use Gpupo\CnovaSdk\Entity\Order\Customer\Customer;
use Gpupo\CnovaSdk\Entity\Order\Order;
use Gpupo\Tests\CnovaSdk\Entity\Order\OrderTestCaseAbstract;

class CustomerTest extends OrderTestCaseAbstract
{
    public static function setUpBeforeClass()
    {
        self::displayClassDocumentation(new Customer());
    }

    /**
     * @dataProvider dataProviderOrderCollection
     */
    public function testÉPropriedadeDeOrder(Order $order)
    {
        $this->assertInstanceOf('Gpupo\CnovaSdk\Entity\Order\Customer\Customer', $order->getCustomer());
    }

    /**
     * @dataProvider dataProviderCustomers
     */
    public function testPossuiObjetoPhones(Customer $customer)
    {
        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Order\Customer\Phones\Phones', $customer->getPhones());
    }
}
