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
