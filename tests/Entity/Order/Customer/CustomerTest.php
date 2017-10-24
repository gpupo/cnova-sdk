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
