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
use Gpupo\CnovaSdk\Entity\Product\Stock;

class StockTest extends TestCaseAbstract
{
    public function testÉPropriedadeDeProduct()
    {
        $manager = $this->getFactory()->factoryManager('product');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Product/ProductId.json'));
        $product = $manager->findById(14080);

        $stock = $product->getStock();
        $this->assertInstanceOf('Gpupo\CnovaSdk\Entity\Product\Stock', $stock);


        return $stock;
    }

    /**
     * @depends testÉPropriedadeDeProduct
     */
    public function testPossuiQuantidade(Stock $stock)
    {
        $this->assertEquals(5, $stock->getQuantity());
    }

    /**
     * @depends testÉPropriedadeDeProduct
     */
    public function testPossuiTempoPreparaçãoDoProduto(Stock $stock)
    {
        $this->assertEquals(1, $stock->getCrossDockingTime());
    }

    /**
     * @depends testÉPropriedadeDeProduct
     */
    public function testEntregaParâmetrosParaAtualizaçãoDeEstoqueDoSku(Stock $stock)
    {
        $json = $stock->toJson();
        $array = json_decode($json, true);

        foreach (['quantity', 'crossDockingTime'] as $key) {
            $this->assertArrayHasKey($key, $array, $json);
        }
    }
}
