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

use Gpupo\CnovaSdk\Entity\Product\Loads\Loads;
use Gpupo\CnovaSdk\Entity\Product\Loads\Metadata;
use Gpupo\Tests\CnovaSdk\TestCaseAbstract;

class ManagerTest extends TestCaseAbstract
{
    protected function getManager()
    {
        return $this->getFactory()->factoryManager('loads');
    }

    public function testObtemListaDeSituacoesDeProdutos()
    {
        $manager = $this->getManager();
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Loads.json'));
        $entity = $this->getFactory()->createProduct(current($this->dataProviderProducts()));

        $loads = $manager->fetch();
        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Product\Loads\Loads', $loads);

        return $loads;
    }

    /**
     * @depends testObtemListaDeSituacoesDeProdutos
     */
    public function testPossuiObjetoMetadata(Loads $loads)
    {
        $metadata = $loads->getMetadata();

        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Product\Loads\Metadata', $metadata);

        return $metadata;
    }

    /**
     * @depends testPossuiObjetoMetadata
     */
    public function testMetadataPossuiQuantidadeDeObjetosEnviados(Metadata $metadata)
    {
        $this->assertEquals(6287, $metadata->getTotalRows());
    }

    /**
     * @depends testPossuiObjetoMetadata
     */
    public function testMetadataPossuiInformacaoDoOffsetAtual(Metadata $metadata)
    {
        $this->assertEquals(0, $metadata->getOffset());
    }

    /**
     * @depends testPossuiObjetoMetadata
     */
    public function testMetadataPossuiInformacaoDoLimitAtual(Metadata $metadata)
    {
        $this->assertEquals(20, $metadata->getLimit());
    }

    /**
     * @depends testObtemListaDeSituacoesDeProdutos
     */
    public function testPossuiColecaoDeObjetosProduct(Loads $loads)
    {
        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Product\Product', $loads->first());
    }
}
