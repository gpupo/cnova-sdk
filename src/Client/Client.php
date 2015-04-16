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
            'access_token'  => false,
            'base_url'      => 'https://{VERSION}.cnova.com/api/v2',
            'version'       => 'sandbox',
            'verbose'       => false,
            'sslVersion'    => 'SecureTransport',
            'cacheTTL'      => 3600,
        ];
    }

    protected function renderAuthorization()
    {
        $list = [];

        foreach(['client_id', 'access_token'] as $key) {
            $value = $this->getOptions()->get('client_id');
            if (empty($value)) {
                throw new \InvalidArgumentException('['.$value.'] ausente!');
            }

            $list[] = $key.':'. $value;

        }

        return $list;
    }
}
