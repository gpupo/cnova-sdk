<?php

/*
 * This file is part of gpupo/cnova-sdk
 *
 * (c) Gilmar Pupo <g@g1mr.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For more information, see
 * <http://www.g1mr.com/cnova-sdk/>.
 */
namespace Gpupo\Tests\CnovaSdk\Entity\Product;

use Gpupo\CnovaSdk\Entity\Product\Product;
use Gpupo\Tests\CnovaSdk\TestCaseAbstract;

class ProductTest extends TestCaseAbstract
{
    public static function setUpBeforeClass()
    {
        self::displayClassDocumentation(new Product());
    }

    protected function factory($data)
    {
        return $this->getFactory()->createProduct($data);
    }

    protected function assertIsObject($name)
    {
        $method = 'get' . $name;
        $this->assertInstanceOf('Gpupo\CnovaSdk\Entity\Product\\' . $name,
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
    public function testPossuiPropriedadesEObjetos(Product $product)
    {
        $this->assertInstanceOf('Gpupo\CnovaSdk\Entity\Product\Product', $product);
        $this->assertInstanceOf('Gpupo\CnovaSdk\Entity\Product\Dimensions', $product->getDimensions());
    }

    /**
     * @dataProvider dataProviderProducts
     */
    public function testPossuiUmaColecaoAttributes(Product $product)
    {
        foreach ($product->getAttributes() as $attribute) {
            $this->assertInstanceOf('Gpupo\CnovaSdk\Entity\Product\Attributes\Attribute', $attribute);
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
