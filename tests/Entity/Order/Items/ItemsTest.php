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

namespace Gpupo\Tests\CnovaSdk\Entity\Order\Items;

use Gpupo\CnovaSdk\Entity\Order\Items\Items;
use Gpupo\Tests\CnovaSdk\TestCaseAbstract;

class ItemsTest extends TestCaseAbstract
{
    public function testPossuiColeçãoDeObjetosProduct()
    {
        $items = new Items(require $this->getResourceFilePath('fixture/Order/Items/items.php'));

        foreach ($items as $product) {
            $this->assertInstanceOf('\Gpupo\CnovaSdk\Entity\Order\Items\Product\Product', $product);
        }

        return $items;
    }

    /**
     * @depends testPossuiColeçãoDeObjetosProduct
     */
    public function testPossuiIdsDiferentesParaCadaUnidadeMesmoComSkusIguais(Items $items)
    {
        foreach ($items as $product) {
            $this->assertEquals('14080', $product->getSkuSellerId());
        }
    }

    /**
     * @depends testPossuiColeçãoDeObjetosProduct
     */
    public function testContémListaDeIdsExistentesNaColeção(Items $items)
    {
        $this->assertEquals(['23236199-1', '23236199-2'], $items->getIdList());
    }
}
