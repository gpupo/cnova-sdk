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

namespace Gpupo\Tests\CnovaSdk\Client;

use Gpupo\Tests\CnovaSdk\TestCaseAbstract;

class ClientTest extends TestCaseAbstract
{
    public function testSucessoAoDefinirOptions()
    {
        $client = $this->factoryClient();
        $this->assertInstanceOf('\Gpupo\CommonSdk\Client\ClientInterface', $client);

        return $client;
    }

    /**
     * @depends testSucessoAoDefinirOptions
     */
    public function testGerenciaUriDeRecurso($client)
    {
        $this->assertEquals('https://sandbox.cnova.com/api/v2/sku',
            $client->getResourceUri('/sku'));
    }

    /**
     * @depends testSucessoAoDefinirOptions
     */
    public function testObjetoRequestPossuiHeader($client)
    {
        if (!$this->hasToken()) {
            return $this->markTestIncomplete('API Token ausente');
        }
        
        $header = implode(';', $client->factoryRequest('/')->getHeader());

        foreach(['client_id', 'access_token'] as $key) {
            $this->assertContains($key, $header);
        }
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
