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

use Gpupo\CnovaSdk\Entity\Product\ProductExtended;
use Gpupo\Common\Entity\CollectionAbstract;

class Loads extends CollectionAbstract
{
    protected $metadata;

    public function getMetadata()
    {
        return $this->metadata;
    }

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

    protected function factoryMetadata(array $metas)
    {
        $data = [];

        foreach ($metas as $meta) {
            $data[$meta['key']] = $meta['value'];            
        }

        $this->metadata = new Metadata($data);
    }

    public function __construct(CollectionAbstract $data = null)
    {
        $this->factoryMetadata($data->getMetadata());

        foreach ($data->getSkus() as $product) {
            $this->add($this->factoryProduct($product));
        }
    }
}
