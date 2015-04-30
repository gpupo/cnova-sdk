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

namespace Gpupo\Tests\CnovaSdk\Entity\Product\Loads;

use Gpupo\CnovaSdk\Entity\Product\Loads\LoadsCollection;

class LoadsTest extends TestCaseAbstract
{
    public function testPossuiColecaoDeProducts()
    {
        $loads = $this->getLoads();

        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Product\Product', $loads->first());
        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Product\ProductExtended', $loads->first());

        return $loads;
    }

    /**
     * @depends testPossuiColecaoDeProducts
     */
    public function testCadaProductPossuiStatus(LoadsCollection $loads)
    {
        foreach ($loads as $product) {
            $this->assertContains($product->getStatus(),
                ['Available', 'Pending', 'Canceled', 'Error']);
        }
    }

    /**
     * @depends testPossuiColecaoDeProducts
     */
    public function testPossuiObjetoMetadata(LoadsCollection $loads)
    {
        $metadata = $loads->getMetadata();

        $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Metadata', $metadata);

        return $metadata;
    }
}
