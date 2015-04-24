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

class ProductTest extends TestCaseAbstract
{
    protected function factory($data)
    {
        return $this->getFactory()->createProduct($data);
    }

    protected function assertIsObject($name)
    {
        $method = 'get'.$name;
        $this->assertInstanceOf('Gpupo\CnovaSdk\Entity\Product\\'.$name,
            $this->factorySingleProduct()->$method());
    }

    protected function factorySingleProduct()
    {
        $data = $this->dataProviderProducts();
        $current = current($data);

        return $this->factory($current);
    }

    /**
     * @dataProvider dataProviderProducts
     */
    public function testPossuiPropriedadesEObjetos(array $data)
    {
        $product = $this->factory($data);

        $this->assertInstanceOf('Gpupo\CnovaSdk\Entity\Product\Product', $product);

        foreach (['skuSellerId', 'title', 'description', 'brand'] as $key) {
            $this->assertEquals($data[$key], $product->get($key), 'Simples');
            $method = 'get'.ucfirst($key);
            $this->assertEquals($data[$key], $product->$method(), 'Magic');
        }

        $this->assertInstanceOf('Gpupo\CnovaSdk\Entity\Product\Dimensions', $product->getDimensions());
    }

    /**
     * @dataProvider dataProviderProducts
     */
    public function testPossuiUmaColecaoAttributes($data)
    {
        $product = $this->factory($data);

        foreach ($data['attributes'] as $item) {
            $attribute = $product->getAttributes()->current();
            $this->assertInstanceOf('Gpupo\CnovaSdk\Entity\Product\Attributes\Attribute', $attribute);

            $this->assertEquals($item['name'], $attribute->getName());
            $this->assertEquals($item['value'], $attribute->getValue());

            $product->getAttributes()->next();
        }
    }

    public function testPossuiObjetoPrice()
    {
        return $this->assertIsObject('Price');
    }
    public function testPossuiObjetoStock()
    {
        return $this->assertIsObject('Stock');
    }

    public function testPossuiObjetoDimensions()
    {
        return $this->assertIsObject('Dimensions');
    }

    public function testPossuiObjetoGiftWrap()
    {
        return $this->assertIsObject('GiftWrap');
    }

    /**
     * @dataProvider dataProviderProducts
     */
    public function testEntregaJson($data)
    {
        $product = $this->factory($data);
        $json = $product->toJson();
        $array = json_decode($json, true);

        foreach (['skuSellerId', 'title', 'description', 'brand'] as $key) {
            $this->assertArrayHasKey($key, $array);
        }
    }
}
