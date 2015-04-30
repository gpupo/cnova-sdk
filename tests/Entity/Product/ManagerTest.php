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

class ManagerTest extends TestCaseAbstract
{
    protected function getManager($filename = 'Products.json')
    {
        $manager = $this->getFactory()->factoryManager('product');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Product/'.$filename));

        return $manager;
    }

    public function testAcessoAoAdministradorDeProdutos()
    {
        $manager = $this->getManager();

        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Product\Manager', $manager);

        return $manager;
    }

    /**
     * @depends testAcessoAoAdministradorDeProdutos
     */
    public function testPossuiObjetoPool($manager)
    {
        $this->assertInstanceOf('\Gpupo\CommonSdk\Pool', $manager->getPool());
    }

    /**
     * @depends testAcessoAoAdministradorDeProdutos
     */
    public function testPossuiObjetoClient($manager)
    {
        $this->assertInstanceOf('\Gpupo\CnovaSdk\Client\Client', $manager->getClient());
    }

    /**
     * @depends testAcessoAoAdministradorDeProdutos
     */
    public function testObtemListaDeProdutosCadastrados($manager)
    {
        $list = $manager->fetch();
        $this->assertInstanceOf('\Gpupo\Common\Entity\CollectionInterface', $list);

        return $list;
    }

    public function testRecuperaInformacoesDeUmProdutoEspecifico()
    {
        $manager = $this->getManager('ProductId.json');
        $product = $manager->findById(14080);
        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Product\Product', $product);
        $this->assertEquals(14080, $product->getSkuSellerId());
        $this->assertEquals(14080, $product->getId());
    }

    public function testGuardaProdutosNaoCadastradosEmUmaFilaParaGravacaoEmLote()
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
                $this->assertEquals($item[$key], $poolItem[$key]);
            }

            next($poolItens);
        }
    }

    public function testGerenciaGravacaoDeProdutosEmLote()
    {
        if (!$this->hasToken()) {
            return $this->markSkipped('API Token ausente');
        }

        $manager = $this->getManager();
        $list = $this->dataProviderProducts();

        $i = 0;
        foreach ($list as $data) {
            $product = $this->getFactory()->createProduct(current($data));

            $exist = $manager->findById($product->getSkuSellerId());

            if (!$exist) {
                $i++;
                $this->assertTrue($manager->save($product));
                $this->log('debug', 'Produto enviado para lote', [
                        'skuSellerId'    => $product->getSkuSellerId(),
                ]);
            } else {
                $this->log('debug', 'Produto existente', [
                    'skuSellerId'    => $product->getSkuSellerId(),
                ]);
            }
        }

        if ($i < 1) {
            return $this->markSkipped('Sem produtos para cadastrar');
        }

        $this->assertTrue($manager->commit(), 'Gravacao de lote');
    }

    public function testNaoExecutaOperacaoEmProdutoInalterado()
    {
        $manager = $this->getManager()->setDryRun();
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
        $manager = $this->getManager()->setDryRun();
        $list = $this->dataProviderProducts();

        foreach ($list as $data) {
            $entityA = $this->getFactory()->createProduct(current($data));
            $entityB = $this->getFactory()->createProduct(current($data));
            $entityB->getStock()->setQuantity(8);
            $this->assertEquals(['quantity'], $manager->attributesDiff($entityA->getStock(), $entityB->getStock()), 'Diff');
            $entityA->setPrevious($entityB);
            $this->assertTrue($manager->save($entityA), 'Save');
        }
    }
}
