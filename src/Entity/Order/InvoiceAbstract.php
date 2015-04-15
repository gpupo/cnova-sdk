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

namespace Gpupo\CnovaSdk\Entity\Order;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

abstract class InvoiceAbstract extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return  [
            'cnpj'      =>  'string',
            'number'    =>  'string',
            'serie'     =>  'string',
            'issuedAt'  =>  'date-time',
            'accessKey' =>  'string',
            'linkXML'   =>  'string',
            'linkDanfe' =>  'string'
        ];
    }
}