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

namespace Gpupo\Tests\CnovaSdk\Entity\Order\Items\Product;

use Gpupo\CnovaSdk\Entity\Order\Items\Product\Product;
use Gpupo\Tests\CnovaSdk\TestCaseAbstract;

class ProductTest extends TestCaseAbstract
{
    public static function setUpBeforeClass()
    {
        self::displayClassDocumentation(new Product());
    }

    public function testPossuiUmIdentificadorPorUnidade()
    {
        $product = new Product(require $this->getResourceFilePath('fixture/Order/Items/Product/product.php'));
        $this->assertSame('23236199-2', $product->getId());

        return $product;
    }

    /**
     * @depends testPossuiUmIdentificadorPorUnidade
     */
    public function testPossuiIdentificadorDoSku(Product $product)
    {
        $this->assertSame('14080', $product->getSkuSellerId());
    }
}
