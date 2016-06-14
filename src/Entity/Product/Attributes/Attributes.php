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
namespace Gpupo\CnovaSdk\Entity\Product\Attributes;

use Gpupo\CommonSdk\Entity\CollectionAbstract;

class Attributes extends CollectionAbstract
{
    public function factoryElement($data)
    {
        return new Attribute($data);
    }
}
