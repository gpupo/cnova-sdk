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

namespace Gpupo\CnovaSdk\Client;

use Gpupo\CommonSdk\Client\ClientAbstract;
use Gpupo\CommonSdk\Client\ClientInterface;

class Client extends ClientAbstract implements ClientInterface
{
    public function getDefaultOptions()
    {
        return [
            'client_id'     => false,
            'access_token'  => false,
            'base_url'      => 'https://{VERSION}.cnova.com/api/v2',
            'version'       => 'sandbox',
            'verbose'       => false,
            'sslVersion'    => 'SecureTransport',
            'cacheTTL'      => 3600,
            'sslVerifyPeer' => true,
        ];
    }

    protected function renderAuthorization()
    {
        $list = [];

        foreach (['client_id', 'access_token'] as $key) {
            $value = $this->getOptions()->get($key);
            if (empty($value)) {
                throw new \InvalidArgumentException('['.$key.'] ausente!');
            }

            $list[] = $key.':'.$value;
        }

        return $list;
    }
}
