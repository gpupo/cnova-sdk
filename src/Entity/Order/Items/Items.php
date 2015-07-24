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
