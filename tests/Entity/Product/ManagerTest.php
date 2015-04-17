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
use Gpupo\CnovaSdk\Factory;

class ManagerTest extends TestCaseAbstract
{
    protected function getManager()
    {
        return $this->getFactory()->factoryManager('product');
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
    public function testPossuiObjetoClient($manager)
    {
        $this->assertInstanceOf('\Gpupo\CnovaSdk\Client\Client', $manager->getClient());
    }

    /**
     * @depends testAcessoAoAdministradorDeProdutos
     */
    public function testObtemListaDeProdutosCadastrados($manager)
    {
        if (!$this->hasToken()) {
            return $this->markTestSkipped('API Token ausente');
        }

        $list = $manager->fetch();

        if (empty($list)) {
            return $this->markTestSkipped('Nenhum produto encontrado');
        }

        $this->assertInstanceOf('\Gpupo\Common\Entity\CollectionInterface', $list);

        return $list;
    }

    /**
     * @depends testObtemListaDeProdutosCadastrados
     */
    public function testRecuperaInformacoesDeUmProdutoEspecifico($list)
    {
        if (!$this->hasToken()) {
            return $this->markTestSkipped('API Token ausente');
        }

        if (empty($list)) {
            return $this->markTestSkipped('Nenhum produto cadastrado');
        }

        $manager = $this->getManager();

        foreach ($list as $product) {
            $info = $manager->findById($product->getId());

            $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Product\Product',
            $info);

            $this->assertEquals($product->getSkuSellerId(), $info->getSkuSellerId());
        }
    }

    public function testGerenciaUpdate()
    {
        if (!$this->hasToken()) {
            return $this->markTestSkipped('API Token ausente');
        }

        $manager = $this->getManager();

        foreach ($this->dataProviderProducts() as $array) {
            $data = current($array);
            $product = $this->getFactory()->createProduct($data);
            $this->assertTrue($manager->save($product), $product);
        }
    }
}
