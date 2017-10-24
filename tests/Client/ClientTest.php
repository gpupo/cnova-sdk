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
        $this->assertSame(
            'https://sandbox.cnova.com/api/v2/sku',
            $client->getResourceUri('/sku')
        );
    }

    /**
     * @depends testSucessoAoDefinirOptions
     */
    public function testObjetoRequestPossuiHeader($client)
    {
        if (!$this->hasToken()) {
            return $this->markSkipped('API Token ausente');
        }

        $header = implode(';', $client->factoryRequest('/')->getHeader());

        foreach (['client_id', 'access_token'] as $key) {
            $this->assertContains($key, $header);
        }
    }

    /**
     * @requires extension curl
     */
    public function testAcessoAListaDePedidos()
    {
        if (!$this->hasToken()) {
            return $this->markSkipped('API Token ausente');
        }

        $response = $this->factoryClient()->get('/orders/status/new/?_offset=0&_limit=1');
        $this->assertSame('200', $response->getHttpStatusCode());
    }

    /**
     * @requires extension curl
     */
    public function testAcessoAListaDeProdutos()
    {
        if (!$this->hasToken()) {
            return $this->markSkipped('API Token ausente');
        }

        $response = $this->factoryClient()->get('/sellerItems/status/selling/?_offset=0&_limit=1');
        $this->assertSame('200', $response->getHttpStatusCode());
    }
}
