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

namespace Gpupo\CnovaSdk\Entity\Product\Loads;

use Gpupo\CnovaSdk\Entity\MetadataContainerAbstract;
use Gpupo\CnovaSdk\Entity\Product\ProductExtended;

class LoadsCollection extends MetadataContainerAbstract
{
    protected function factoryProduct(array $raw)
    {
        $data = [
            'skuSellerId'   => $raw['skuSeller']['id'],
            'href'          => $raw['skuSeller']['href'],
            'status'        => $raw['status'],
            'createdAt'     => $raw['createdAt'],
        ];

        return new ProductExtended($data);
    }

    public function __construct($data = null)
    {
        parent::__construct($data);

        foreach ($data->getSkus() as $product) {
            $this->add($this->factoryProduct($product));
        }
    }
}
