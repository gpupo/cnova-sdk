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

use Gpupo\CnovaSdk\Entity\Product\Price;
use Gpupo\Tests\CnovaSdk\TestCaseAbstract;

class PriceTest extends TestCaseAbstract
{
    public function testÉPropriedadeDeProduct()
    {
        $manager = $this->getFactory()->factoryManager('product');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Product/ProductId.json'));
        $product = $manager->findById(14080);

        $price = $product->getPrice();
        $this->assertInstanceOf('Gpupo\CnovaSdk\Entity\Product\Price', $price);

        return $price;
    }

    /**
     * @depends testÉPropriedadeDeProduct
     */
    public function testPossuiPreçoDe(Price $price)
    {
        $this->assertSame(139.0, $price->getDefault());
    }

    /**
     * @depends testÉPropriedadeDeProduct
     */
    public function testPossuiPreçoPor(Price $price)
    {
        $this->assertSame(119.0, $price->getOffer());
    }

    /**
     * @depends testÉPropriedadeDeProduct
     */
    public function testEntregaParâmetrosParaAtualizaçãoDePreçoDoSku(Price $price)
    {
        $json = $price->toJson();

        $array = json_decode($json, true);

        foreach (['default', 'offer'] as $key) {
            $this->assertArrayHasKey($key, $array, $json);
        }
    }
}
