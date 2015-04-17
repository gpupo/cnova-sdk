<?php


namespace Gpupo\Tests\CnovaSdk;

use Gpupo\CnovaSdk\Factory;
use Gpupo\Tests\CommonSdk\FactoryTestAbstract;

class FactoryTest extends FactoryTestAbstract
{
    public $namespace =  '\Gpupo\CnovaSdk\\';

    public function getFactory()
    {
        return Factory::getInstance();
    }

    /**
     * @dataProvider dataProviderManager
     */
    public function testCentralizaAcessoAManagers($objectExpected, $target)
    {
        return $this->assertInstanceOf($objectExpected,
            $this->createObject($this->getFactory(), 'factoryManager', $target));
    }

    public function dataProviderObjetos()
    {
        return [
            [$this->namespace.'Entity\Product\Product', 'product', null],
            //[$this->namespace.'Entity\Order\Order', 'order', null],
        ];
    }

    public function dataProviderManager()
    {
        return [
            [$this->namespace.'Entity\Product\Manager', 'product'],
            //[$this->namespace.'Entity\Order\Manager', 'order'],
        ];
    }
}
