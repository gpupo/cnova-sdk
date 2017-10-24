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

namespace Gpupo\Tests\CnovaSdk\Entity\Product;

use Gpupo\CnovaSdk\Entity\Product\Stock;
use Gpupo\Tests\CnovaSdk\TestCaseAbstract;

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
        $this->assertSame(5, $stock->getQuantity());
    }

    /**
     * @depends testÉPropriedadeDeProduct
     */
    public function testPossuiTempoPreparaçãoDoProduto(Stock $stock)
    {
        $this->assertSame(1, $stock->getCrossDockingTime());
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
