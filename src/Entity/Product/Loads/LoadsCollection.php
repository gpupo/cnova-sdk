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

namespace Gpupo\CnovaSdk\Entity\Product\Loads;

use Gpupo\CnovaSdk\Entity\MetadataContainerAbstract;
use Gpupo\CnovaSdk\Entity\Product\ProductExtended;

class LoadsCollection extends MetadataContainerAbstract
{
    protected function getKey()
    {
        return 'skus';
    }

    protected function factoryEntity(array $data)
    {
        $input = [
            'skuSellerId'   => $data['skuSeller']['id'],
            'href'          => $data['skuSeller']['href'],
            'status'        => $data['status'],
            'createdAt'     => $data['createdAt'],
        ];

        return new ProductExtended($input);
    }
}
