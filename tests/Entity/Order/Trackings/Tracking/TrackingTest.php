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

use Gpupo\CnovaSdk\Entity\Order\Trackings\Tracking\Tracking;
use Gpupo\Tests\CnovaSdk\Entity\Order\OrderTestCaseAbstract;

class TrackingTest extends OrderTestCaseAbstract
{
    public static function setUpBeforeClass()
    {
        self::displayClassDocumentation(new Tracking());
    }

    protected function factoryTracking()
    {
        $tracking = new Tracking([
            'items' => [
                '23236199-1',
                '23236199-2',
            ],
            'occurredAt'       => '2015-05-04T14:54:29.000-03:00',
            'number'           => 'PE327842878BR',
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
        ]);
    }

    public function testPossuiColeçãoDeItems()
    {
    }

    public function testInválidoComRastreamentoAusente()
    {
        return $this->markIncomplete();
    }

    public function testInválidoComNotaFiscalAusente()
    {
        return $this->markIncomplete();
    }

    public function testVálidoComDadosCompletos()
    {
        return $this->markIncomplete();
    }
}
