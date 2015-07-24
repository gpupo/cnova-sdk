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

use Gpupo\CnovaSdk\Entity\Product\ProductCollection;
use Gpupo\Tests\CnovaSdk\Entity\MetadataContainerTestAbstract;

class ProductCollectionTest extends MetadataContainerTestAbstract
{
    public function dataProviderContainer()
    {
        $data = $this->getResourceJson('fixture/Product/sellerItems.json');

        $container = new ProductCollection($data);

        return [
            [$container, ['totalRows' => 6273]],
        ];
    }

    /**
     * @dataProvider dataProviderContainer
     */
    public function testPossuiColeçãoDeProducts(ProductCollection $container)
    {
        foreach ($container as $product) {
            $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Product\Product', $product);
        }
    }
}
