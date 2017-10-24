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

namespace Gpupo\Tests\CnovaSdk;

use Gpupo\CnovaSdk\Factory;
use Gpupo\Tests\CommonSdk\FactoryTestAbstract;

class FactoryTest extends FactoryTestAbstract
{
    public $namespace = '\Gpupo\CnovaSdk\\';

    public function getFactory()
    {
        return Factory::getInstance();
    }

    /**
     * @dataProvider dataProviderManager
     */
    public function testCentralizaAcessoAManagers($objectExpected, $target)
    {
        return $this->assertInstanceOf(
            $objectExpected,
            $this->createObject($this->getFactory(), 'factoryManager', $target)
        );
    }

    public function dataProviderObjetos()
    {
        return [
            [$this->namespace.'Entity\Product\Product', 'product', null],
            [$this->namespace.'Entity\Order\Order', 'order', null],
        ];
    }

    public function dataProviderManager()
    {
        return [
            [$this->namespace.'Entity\Product\Manager', 'product'],
            [$this->namespace.'Entity\Order\Manager', 'order'],
        ];
    }
}
