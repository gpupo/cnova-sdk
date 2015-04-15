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

namespace Gpupo\CnovaSdk\Client;

use Gpupo\CommonSdk\Client\ClientAbstract;
use Gpupo\CommonSdk\Client\ClientInterface;

class Client extends ClientAbstract implements ClientInterface
{
    public function getDefaultOptions()
    {
        return [
            'client_id'     => false,
            'client_secret' => false,
            'base_url'      => 'https://{VERSION}.cnova.com/api/v2',
            'version'       => 'sandbox',
            'verbose'       => false,
            'sslVersion'    => 'SecureTransport',
            'cacheTTL'      => 3600,
        ];
    }

    protected function factoryTransport()
    {
        $transport = parent::factoryTransport();
        $client_id = $this->getOptions()->get('client_id');

        if (empty($client_id)) {
            throw new \InvalidArgumentException('client_id nao informado');
        }

        $client_secret = $this->getOptions()->get('client_secret');
        $string = $client_id.':'.$client_secret;
        $authorization = 'X-Authorization: Basic '.base64_encode($string);
        
        $this->debug('AUTENTICACAO', [
            'client_id'     => $client_id,
            'client_secret' => $client_secret,
            'string_raw'    => $string,
            'authorization' => $authorization,
        ]);
            
        $transport->setOption(CURLOPT_HTTPHEADER, [
            $authorization,
            'Content-Type: application/json;charset=UTF-8',
        ]);

        return $transport;
    }
}
