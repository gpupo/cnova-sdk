<?php

/*
 * This file is part of gpupo/cnova-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
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
            $this->assertSame('14080', $product->getSkuSellerId());
        }
    }

    /**
     * @depends testPossuiColeçãoDeObjetosProduct
     */
    public function testContémListaDeIdsExistentesNaColeção(Items $items)
    {
        $this->assertSame(['23236199-1', '23236199-2'], $items->getIdList());
    }
}
