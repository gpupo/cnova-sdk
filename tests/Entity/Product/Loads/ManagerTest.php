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

namespace Gpupo\Tests\CnovaSdk\Entity\Product\Loads;

class ManagerTest extends TestCaseAbstract
{
    public function testObtemListaDeSituacoesDeProdutos()
    {
        $entity = $this->getFactory()->createProduct(current($this->dataProviderProducts()));

        $loads = $this->getLoads();

        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Product\Loads\Loads', $loads);

        return $loads;
    }

    public function testPermiteAcessoAListaDeProdutosComErro()
    {
        $manager = $this->getManager();
        $manager->setDryRun($this->factoryMockup('Errors.json'));
        $loads = $manager->fetch(0, 20, ['status' => 'Error']);

        foreach ($loads as $product) {
            $this->assertEquals('Error', $product->getStatus());
        }
    }
}
