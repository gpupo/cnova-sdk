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
namespace Gpupo\Tests\CnovaSdk\Entity\Product\Loads;

use Gpupo\CnovaSdk\Entity\Metadata;

class MetadataTest extends TestCaseAbstract
{
    public function testÉUmaCollection()
    {
        $metadata = $this->getLoads()->getMetadata();

        $this->assertInstanceOf('\Gpupo\Common\Entity\CollectionAbstract', $metadata);

        return $metadata;
    }

    /**
     * @depends testÉUmaCollection
     */
    public function testMetadataPossuiQuantidadeDeObjetosEnviados(Metadata $metadata)
    {
        $this->assertSame(6287, $metadata->getTotalRows());
    }

    /**
     * @depends testÉUmaCollection
     */
    public function testMetadataPossuiInformacaoDoOffsetAtual(Metadata $metadata)
    {
        $this->assertSame(0, $metadata->getOffset());
    }

    /**
     * @depends testÉUmaCollection
     */
    public function testMetadataPossuiInformacaoDoLimitAtual(Metadata $metadata)
    {
        $this->assertSame(20, $metadata->getLimit());
    }
}
