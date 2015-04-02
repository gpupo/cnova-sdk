<?php

/*
 * This file is part of gpupo/cnova-sdk
 *
 * (c) Gilmar Pupo <g@g1mr.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gpupo\Tests\CnovaSdk\Client\Oauth2;

use Gpupo\Tests\CnovaSdk\TestCaseAbstract;
use Gpupo\CnovaSdk\Client\Oauth2\Provider;

class ProviderTest extends TestCaseAbstract
{
    protected $provider;

    protected function setUp()
    {
        $this->provider = new Provider([
            'clientId'     => $this->getConstant('CLIENT_ID'),
            'clientSecret' => $this->getConstant('CLIENT_SECRET'),
        ]);
    }

    public function testAccessToken()
    {
        return $this->markTestIncomplete();
        
        $client = $this->factoryClient();
 
        $client->post([
            'url'   => 'https://api.cnova.com/oauth/access_token',
        ], json_encode([
            "grant_type" => "authorization_code",
            "code" => "U2VKqVLesgPFs",
            
            ]));
        
    }
    
    public function testFoo()
    {
        return $this->markTestIncomplete();
        
        $client = $this->factoryClient();
 
        $client->post([
            'url'   => 'http://lojista.ehub.com.br/oauth-api/authorize?client_id={clientId}',
        ], json_encode([
            "grant_type" => "authorization_code",
            "code" => "U2VKqVLegPFs",
            
            ]));
        
    }
    
    
}
