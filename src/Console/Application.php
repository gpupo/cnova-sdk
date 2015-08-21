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

namespace Gpupo\CnovaSdk\Console;

use Gpupo\CnovaSdk\Factory;
use Gpupo\CommonSdk\Console\AbstractApplication;

class Application extends AbstractApplication
{
    protected $commonParameters = [
        [
            'key'   => 'client_id',
        ],
        [
            'key'   => 'access_token',
        ],
        [
            'key'       => 'env',
            'options'   => ['sandbox', 'api'],
            'default'   => 'sandbox',
            'name'      => 'Version',
        ],
        [
            'key'       => 'sslVersion',
            'options'   => ['SecureTransport', 'TLS'],
            'default'   => 'SecureTransport',
            'name'      => 'SSL Version',
        ],
        [
            'key'       => 'registerPath',
            'default'   => false,
        ],
    ];

    public function factorySdk(array $options)
    {
        $options['version'] = $options['env'];

        return  Factory::getInstance()->setup($options, $this->factoryLogger());
    }

    public function appendCommand($name, $description, array $definition = [])
    {
        return $this->register($name)
            ->setDescription($description)
            ->setDefinition($this->factoryDefinition($definition));
    }

}
