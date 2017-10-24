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
        $method = 'get'.$name;
        $this->assertInstanceOf(
            'Gpupo\CnovaSdk\Entity\Product\\'.$name,
            $this->factorySingleProduct()->$method()
        );
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
