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

use Gpupo\CnovaSdk\Entity\Product\Loads\LoadsCollection;

class LoadsTest extends TestCaseAbstract
{
    public function testPossuiColecaoDeProducts()
    {
        $loads = $this->getLoads();

        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Product\Product', $loads->first());
        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Product\ProductExtended', $loads->first());

        return $loads;
    }

    /**
     * @depends testPossuiColecaoDeProducts
     */
    public function testCadaProductPossuiStatus(LoadsCollection $loads)
    {
        foreach ($loads as $product) {
            $this->assertContains(
                $product->getStatus(),
                ['Available', 'Pending', 'Canceled', 'Error']
            );
        }
    }

    /**
     * @depends testPossuiColecaoDeProducts
     */
    public function testPossuiObjetoMetadata(LoadsCollection $loads)
    {
        $metadata = $loads->getMetadata();
        $this->assertInstanceOf('\Gpupo\CommonSdk\Entity\Metadata\Metadata', $metadata);

        return $metadata;
    }
}
