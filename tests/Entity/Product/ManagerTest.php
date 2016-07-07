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

use Gpupo\Tests\CnovaSdk\TestCaseAbstract;

class ManagerTest extends TestCaseAbstract
{
    protected function getManager($filename = null)
    {
        if (empty($filename)) {
            $filename = 'sellerItems.json';
        }

        $manager = $this->getFactory()->factoryManager('product');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Product/'.$filename));

        return $manager;
    }

    public function testÉOAdministradorDeProdutos()
    {
        $manager = $this->getManager();

        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Product\Manager', $manager);

        return $manager;
    }

    /**
     * @depends testÉOAdministradorDeProdutos
     */
    public function testPossuiObjetoPool($manager)
    {
        $this->assertInstanceOf('\Gpupo\CommonSdk\Pool', $manager->getPool());
    }

    /**
     * @depends testÉOAdministradorDeProdutos
     */
    public function testPossuiObjetoClient($manager)
    {
        $this->assertInstanceOf('\Gpupo\CnovaSdk\Client\Client', $manager->getClient());
    }

    /**
     * @depends testÉOAdministradorDeProdutos
     */
    public function testObtemListaDeProdutosCadastrados($manager)
    {
        $list = $manager->fetch();
        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Product\ProductCollection', $list);

        return $list;
    }

    public function testRecuperaInformacoesDeUmProdutoEspecificoAPartirDeId()
    {
        $manager = $this->getManager('ProductId.json');
        $product = $manager->findById(14080);
        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Product\Product', $product);
        $this->assertSame('14080', $product->getSkuSellerId());
        $this->assertSame('14080', $product->getId());
    }

    public function testGuardaProdutosEmUmaFilaParaGravacaoEmLote()
    {
        $manager = $this->getManager();
        $list = $this->dataProviderProducts();

        foreach ($list as $data) {
            $product = $this->getFactory()->createProduct(current($data));
            $this->assertTrue($manager->save($product));
        }

        $poolItens = json_decode($manager->getPool()->toJson(), true);

        foreach ($list as $data) {
            $item = current($data);
            $poolItem = current($poolItens);

            foreach (['skuSellerId', 'title', 'description', 'brand'] as $key) {
                $this->assertSame($item[$key], $poolItem[$key]);
            }

            next($poolItens);
        }
    }

    public function testGerenciaGravacaoDeProdutosEmLote()
    {
        $manager = $this->getFactory()->factoryManager('product')->setDryRun();

        $list = $this->dataProviderProducts();

        foreach ($list as $data) {
            $product = current($data);
            $manager->save($product);
        }

        $this->assertTrue($manager->commit(), 'Gravacao de lote');
    }

    public function testAtualizaPrecoEEstoqueDeUmProduto()
    {
        $manager = $this->getFactory()->factoryManager('product')->setDryRun();
        $list = $this->dataProviderProducts();

        foreach ($list as $data) {
            $entityA = $this->getFactory()->createProduct(current($data));
            $entityB = $this->getFactory()->createProduct(current($data));
            $entityA->setPrevious($entityB);
            $this->assertFalse($manager->attributesDiff($entityA, $entityB));
            $this->assertFalse($manager->save($entityA));
        }
    }

    public function testNaoExecutaAtualizacaoEmProdutoInalterado()
    {
        $manager = $this->getFactory()->factoryManager('product')->setDryRun();
        $list = $this->dataProviderProducts();

        foreach ($list as $data) {
            $entityA = $this->getFactory()->createProduct(current($data));
            $entityB = $this->getFactory()->createProduct(current($data));
            $entityA->setPrevious($entityB);
            $this->assertFalse($manager->attributesDiff($entityA, $entityB));
            $this->assertFalse($manager->save($entityA));
        }
    }

    public function testAtualizaApenasEstoqueEmCasoDeSerOUnicoAtributoAlterado()
    {
        $manager = $this->getFactory()->factoryManager('product')->setDryRun();
        $list = $this->dataProviderProducts();

        foreach ($list as $data) {
            $entityA = $this->getFactory()->createProduct(current($data));
            $entityB = $this->getFactory()->createProduct(current($data));
            $entityB->getStock()->setQuantity(8);
            $this->assertSame(['quantity'], $manager->attributesDiff(
                $entityA->getStock(), $entityB->getStock()), 'Diff');
            $entityA->setPrevious($entityB);
            $this->assertTrue($manager->save($entityA), 'Save');
        }
    }
}
