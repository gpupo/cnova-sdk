<?php

/*
 * This file is part of gpupo/cnova-sdk
 *
 * (c) Gilmar Pupo <g@g1mr.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gpupo\Tests\CnovaSdk\Client;

use Gpupo\Tests\CnovaSdk\TestCaseAbstract;

class ClientTest extends TestCaseAbstract
{
    public function testGerenciaUriDeRecurso()
    {
        $client = $this->factoryClient();
        $this->assertEquals('https://sandbox.cnova.com/api/v2/sku',
            $client->getResourceUri('/sku'));
    }
    /**
     * @requires extension curl
     */
    public function testAcessoAListaDePedidos()
    {
        if (!$this->hasToken()) {
            return $this->markTestIncomplete('API Token ausente');
        }
    }

    /**
     * @requires extension curl
     */
    public function testAcessoAListaDeProdutos()
    {
        return $this->markTestIncomplete();
    }
}
