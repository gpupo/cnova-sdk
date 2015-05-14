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

namespace Gpupo\Tests\CnovaSdk\Entity\Order\Trackings\Tracking;

use Gpupo\CnovaSdk\Entity\Order\Trackings\Tracking\Carrier;
use Gpupo\CnovaSdk\Entity\Order\Trackings\Tracking\Invoice;
use Gpupo\CnovaSdk\Entity\Order\Trackings\Tracking\Tracking;
use Gpupo\Tests\CnovaSdk\Entity\Order\OrderTestCaseAbstract;

class TrackingTest extends OrderTestCaseAbstract
{
    public static function setUpBeforeClass()
    {
        self::displayClassDocumentation(new Tracking());
    }

    protected $fixture = [
        'items' => [
            '23236199-1',
            '23236199-2',
        ],
        'occurredAt'       => '2015-05-04T14:54:29.000-03:00',
        'number'           => 'PE327842878BR',
        'url'              => 'http://websro.correios.com.br/sro_bin/txect01$.querylist?p_lingua=001&p_tipo=001&p_cod_uni=PE327842878BR',
        'sellerDeliveryId' => '975101',
        'carrier'          => [
            'name' => 'ECT',
            'cnpj' => '111111111111',
        ],
        'invoice' => [
            'cnpj'      => '111111111111',
            'number'    => '2456',
            'serie'     => '1',
            'issuedAt'  => '2015-05-04T14:54:29.000-03:00',
            'accessKey' => 'fooBarZetaJones',
            'linkXML'   => 'http://foo/bar',
            'linkDanfe' => 'http://bar/foo',
        ],
    ];

    public function factoryTracking()
    {
        return new Tracking($this->fixture);
    }

    public function testPossuiListaDeItems()
    {
        $tracking = $this->factoryTracking();
        $this->assertContains('23236199-1', $tracking->getItems());
    }

    /**
     * @expectedException \Gpupo\CommonSdk\Exception\ExceptionInterface
     */
    public function testInválidoComRastreamentoAusente()
    {
        $tracking = $this->factoryTracking();
        $tracking->setNumber('');
        $tracking->validateForSent();
    }

    /**
     * @expectedException \Gpupo\CommonSdk\Exception\ExceptionInterface
     */
    public function testInválidoComNotaFiscalAusente()
    {
        $tracking = $this->factoryTracking();
        $tracking->setInvoice(new Invoice([]));
        $tracking->validateForSent();
    }

    /**
     * @expectedException \Gpupo\CommonSdk\Exception\ExceptionInterface
     */
    public function testInválidoComTransportadoraAusente()
    {
        $tracking = $this->factoryTracking();
        $tracking->setCarrier(new Carrier([]));
        $tracking->validateForSent();
    }

    public function testVálidoComDadosCompletos()
    {
        $tracking = $this->factoryTracking();
        $this->assertTrue($tracking->validateForSent());
    }

    public function testPossuiFormatoParaAtualizaçãoDeOrder()
    {
        $tracking = $this->factoryTracking();
        $json = $tracking->toJson();
        $array = json_decode($json, true);

        $this->assertEquals($this->fixture, $array);
    }
}
