<?php

/*
 * This file is part of gpupo/cnova-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
 */

namespace Gpupo\CnovaSdk;

use Gpupo\CnovaSdk\Client\Client;
use Gpupo\CommonSdk\FactoryAbstract;

class Factory extends FactoryAbstract
{
    public function setClient(array $clientOptions = [])
    {
        $this->client = new Client($clientOptions, $this->logger);
    }

    public function getNamespace()
    {
        return '\Gpupo\CnovaSdk\Entity\\';
    }

    protected function getSchema($namespace = null)
    {
        return [
            'product' => [
                'class'   => $namespace.'Product\Product',
                'manager' => $namespace.'Product\Manager',
            ],
            'order' => [
                'class'   => $namespace.'Order\Order',
                'manager' => $namespace.'Order\Manager',
            ],
            'loads' => [
                'class'   => $namespace.'Product\Loads\Loads',
                'manager' => $namespace.'Product\Loads\Manager',
            ],
        ];
    }
}
