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

namespace Gpupo\CnovaSdk\Entity\Order\Items;

use Gpupo\CommonSdk\Entity\CollectionAbstract;

class Items extends CollectionAbstract
{
    public function factoryElement($data)
    {
        return new Product\Product($data);
    }

    public function getIdList()
    {
        $list = [];

        foreach ($this as $product) {
            $list[] = $product->getId();
        }

        return $list;
    }
}
