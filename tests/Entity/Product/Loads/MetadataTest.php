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

namespace Gpupo\Tests\CnovaSdk\Entity\Product\Loads;

use Gpupo\CommonSdk\Entity\Metadata\Metadata;

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
