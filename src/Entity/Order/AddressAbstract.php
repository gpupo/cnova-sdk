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
namespace Gpupo\CnovaSdk\Entity\Order;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

abstract class AddressAbstract extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return  [
            'address'       => 'string',
            'number'        => 'string',
            'complement'    => 'string',
            'quarter'       => 'string',
            'reference'     => 'string',
            'city'          => 'string',
            'state'         => 'string',
            'countryId'     => 'string',
            'zipCode'       => 'string',
            'recipientName' => 'string',
        ];
    }
}
