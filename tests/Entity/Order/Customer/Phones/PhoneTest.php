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

namespace Gpupo\Tests\CnovaSdk\Entity\Order\Customer\Phones;

use Gpupo\CnovaSdk\Entity\Order\Customer\Phones\Phone;
use Gpupo\CnovaSdk\Entity\Order\Customer\Phones\Phones;
use Gpupo\Tests\CnovaSdk\Entity\Order\OrderTestCaseAbstract;

class PhoneTest extends OrderTestCaseAbstract
{
    public static function setUpBeforeClass()
    {
        self::displayClassDocumentation(new Phone());
    }

    /**
     * @dataProvider dataProviderPhones
     */
    public function testPossuiNumero(Phones $phones)
    {
        foreach ($phones as $phone) {
            $this->assertGreaterThan(10000000000, $phone->getNumber());
        }
    }

    /**
     * @dataProvider dataProviderPhones
     */
    public function testPossuiIdentificaçãoDeTipo(Phones $phones)
    {
        foreach ($phones as $phone) {
            $this->assertTrue(in_array($phone->getType(), ['HOME', 'CELLPHONE', 'BUSINESS', 'MOBILE', 'OFFICE'], true));
        }
    }
}
