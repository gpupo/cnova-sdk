<?php

/*
 * This file is part of gpupo/cnova-sdk
 *
 * (c) Gilmar Pupo <g@g1mr.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gpupo\Tests\CnovaSdk\Entity\Order\Customer;

use Gpupo\Tests\CnovaSdk\Entity\Order\OrderTestCaseAbstract;

class CustomerTest extends OrderTestCaseAbstract
{
    public function testCadaClientePossuiColecaoDeTelefones()
    {
        foreach ($this->getList() as $order) {
            $phones = $order->getCustomer()->getPhones();
            
            $this->assertInstanceOf('\Gpupo\Common\Entity\CollectionAbstract',$phones);
            
            foreach($phones as $phone) {
                $this->assertInstanceOf('\Gpupo\Common\Entity\CollectionAbstract',$phone);
                $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Order\Customer\Phones\Phone',$phone);
                $this->assertTrue(in_array($phone->getType(), ['HOME', 'CELLPHONE', 'BUSINESS']));
            }
        }
    }
}
