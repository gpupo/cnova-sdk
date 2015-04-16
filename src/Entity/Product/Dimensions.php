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

namespace Gpupo\CnovaSdk\Entity\Product;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class Dimensions extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return  [
            'weight' => 'number',
            'length' => 'number',
            'width'  => 'number',
            'height' => 'number',
        ];
    }
}
