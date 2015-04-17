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

namespace Gpupo\CnovaSdk;

use Gpupo\CnovaSdk\Client\Client;
use Gpupo\CommonSdk\FactoryAbstract;

class Factory extends FactoryAbstract
{
    public function setClient(array $clientOptions = [])
    {
        $this->client =  new Client($clientOptions, $this->logger);
    }

    public function getNamespace()
    {
        return '\Gpupo\CnovaSdk\Entity\\';
    }

    protected function getSchema($namespace = null)
    {
        return [
            'product' => [
                'class'     => $namespace.'Product\Product',
                'manager'   => $namespace.'Product\Manager',
            ],
        ];
    }
}
