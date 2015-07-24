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
        $this->assertEquals('23236199-2', $product->getId());

        return $product;
    }

    /**
     * @depends testPossuiUmIdentificadorPorUnidade
     */
    public function testPossuiIdentificadorDoSku(Product $product)
    {
        $this->assertEquals('14080', $product->getSkuSellerId());
    }
}
