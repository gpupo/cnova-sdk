<?php

/*
 * This file is part of gpupo/cnova-sdk
 *
 * (c) Gilmar Pupo <g@g1mr.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gpupo\CnovaSdk\Client\Oauth2;

use Gpupo\CommonSdk\Client\Oauth2\Provider\ProviderAbstract;

class Provider extends ProviderAbstract
{
    public function getDefaultOptions()
    {
        return [
            'clientId'      => '',
            'clientSecret'  => '',
            'redirectUri'   => 'none',
            'authorize'     => 'http://lojista.ehub.com.br/oauth-api/authorize?client_id={clientId}',
            'accessToken'   => 'https://api.cnova.com/oauth/access_token',
        ];
    }
}
