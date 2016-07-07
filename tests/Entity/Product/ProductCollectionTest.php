<?php

/*
 * This file is part of gpupo/cnova-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\Tests\CnovaSdk\Entity\Product;

use Gpupo\CnovaSdk\Entity\Product\ProductCollection;
use Gpupo\Tests\CommonSdk\Entity\Metadata\MetadataContainerTestAbstract;

class ProductCollectionTest extends MetadataContainerTestAbstract
{
    public function dataProviderContainer()
    {
        $data = $this->getResourceJson('fixture/Product/sellerItems.json');

        $container = new ProductCollection($data);

        return [
            [$container, ['totalRows' => 6273]],
        ];
    }

    /**
     * @dataProvider dataProviderContainer
     */
    public function testPossuiColeçãoDeProducts(ProductCollection $container)
    {
        foreach ($container as $product) {
            $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Product\Product', $product);
        }
    }
}
