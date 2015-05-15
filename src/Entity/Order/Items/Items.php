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

namespace Gpupo\CnovaSdk\Entity\Order\Items;

use Gpupo\Common\Entity\CollectionAbstract;

class Items extends CollectionAbstract
{
    public function __construct(array $elements = [])
    {
        $list = [];

        foreach ($elements as $product) {
            $list[] = new Product\Product($product);
        }

        parent::__construct($list);
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
