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

namespace Gpupo\Tests\CnovaSdk\Entity\Product;

use Gpupo\Tests\CnovaSdk\TestCaseAbstract;
use Gpupo\CnovaSdk\Entity\Product\Price;

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
        $this->assertEquals(139, $price->getDefault());
    }

    /**
     * @depends testÉPropriedadeDeProduct
     */
    public function testPossuiPreçoPro(Price $price)
    {
        $this->assertEquals(119, $price->getOffer());
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
